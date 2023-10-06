<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use App\Models\DataLayer;
use Illuminate\Contracts\Session\Session;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function myProfile()
    {
        $dl = new DataLayer();
        $owner = $dl->getOwner(session('loggedName'));

            if (!empty($owner)){
                return view('owner.ownerprofile')->with('logged', true)->with('loggedName', session('loggedName'))
                ->with('user_type',session('user_type'))->with('owner',$owner);
            }
            else{
                return redirect()->back()->withInput()->withErrors(['user_type' => 'Invalid user type']);
            }
    }
       

    public function settings()
    {
        $dl = new DataLayer();
        $owner = $dl->getOwner(session('loggedName'));

        if (!empty($owner)){
            return view('owner.ownersettings')->with('logged', true)->with('loggedName', session('loggedName'))
             ->with('user_type',session('user_type'))->with('owner',$owner);
        }
        else{
            return redirect()->back()->withInput()->withErrors(['user_type' => 'Invalid user type']);
        }  
    }

    public function updateProfile(Request $request,$id)
    {
        $dl = new DataLayer();
        $owner = $dl->getOwner(session('loggedName'));
        if ($owner == null) {
            return redirect()->route('pagenotfound');
        }

        if ($owner->id != $id) {
            return redirect()->route('user.accessdenied');
        }

        $oldUsername = $owner->username;
        $oldEmail = $owner->email;
        
        $request->validate ([
            'username' => [
                'required',
                Rule::unique('owner', 'username')->ignore($owner->id),
                function ($attribute, $value, $fail) use ($dl, $oldUsername, $id) {
                    if ($value !== $oldUsername && $dl->checkExistence('owner', 'username', $value)) {
                        $fail(':attribute must be unique.');
                    }
                },
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('owner', 'email')->ignore($owner->id),
                function ($attribute, $value, $fail) use ($dl, $oldEmail, $id) {
                    if ($value !== $oldEmail && $dl->checkExistence('restaurant', 'email', $value)) {
                        $fail(':attribute must be unique.');
                    }
                },
            ],
            'name' => 'required',
            'surname' => 'required',
        ]);

        $dl->updateOwner($owner->id, $request->name, $request->surname, $request->username, $request->email);

        session(['loggedName' => $request->username]);
        
        return redirect()->route('owner.myprofile');
    }

    public function passwordUpdate(Request $request,$id){
        $dl = new DataLayer();
        $owner = $dl->getOwner(session('loggedName'));
        if ($owner == null) {
            return redirect()->route('pagenotfound');$dl = new DataLayer();
        }
        if ($owner->id != $id) {
            return redirect()->route('user.accessdenied');
        }

        $oldPassword = $owner->password;
        
        if($oldPassword != md5($request->oldpassword)){
            $message=['oldpassword' => 'password errata'];
            return Redirect::to(route('owner.settings',$owner->id))->withInput()->withErrors($message);
        }

        $request -> validate([
                'password' => 'required|min:8',
                'password-confirmation' => 'required|same:password'
        ]);

        $dl->updateOwnerPassword($owner->id, $request->password);
        return redirect()->route('owner.myprofile',$owner->id);
    }

    public function goToDelete(Request $request,$id)
    {
        $dl = new DataLayer();
        $owner = $dl->getOwner(session('loggedName'));
        if ($owner == null) {
            return redirect()->route('pagenotfound');
        }
        if ($owner->id != $id) {
            return redirect()->route('user.accessdenied');
        }
        return view('owner.deleteprofile', ['id' => $id, 'logged' => true, 'user_type' => 'owner']);
    }

    public function destroy(Request $request,$id)
    {
        $dl = new DataLayer();
        $owner = $dl->getOwner(session('loggedName'));
        if ($owner == null) {
            return redirect()->route('pagenotfound');
        }
        if ($owner->id != $id) {
            return redirect()->route('user.accessdenied');
        }

        $dl->deleteRestaurantFromPivot($id);
        $dl->deleteOwner($id);

        Auth::logout();
        
        $request->session()->invalidate();


        return redirect()->route('home');
    }

    public function createRestaurant(Request $request)
    {
        $dl = new DataLayer();
        $owner = $dl->getOwner(session('loggedName'));
        $owner_id = $owner->id;

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:restaurant,email',
            'phonenumber' => 'required',
            'street' => 'required',
            'city' => 'required',
            'postalcode' => 'required',
            'country' => 'required',
            'description' => 'required',
            'averageprice' => 'required',
            'food' => 'required',
        ]);

        $restaurant = $dl -> addRestaurant($request->input('name'),$request->input('email'),$request->input('phonenumber'),$request->input('street'),
        $request->input('city'),$request->input('postalcode'),$request->input('country'),$request->input('description'),$request->input('averageprice'),
        $owner_id, $request->input('food'));

        return view('owner.ownerprofile')->with('logged', true)->with('loggedName', session('loggedName'))
        ->with('user_type',session('user_type'))->with('owner',$owner);
    }

    public function restaurantInfo(Request $request,$id){

        $dl = new DataLayer();
        $owner = $dl->getOwner(session('loggedName'));
        if ($owner == null) {
            return redirect()->route('pagenotfound');
        }

        if ($owner->id != $id) {
            return redirect()->route('user.accessdenied');
        }

        $restaurant = $dl->findRestaurantByOwnerId($id);
        $foods = $dl->getFood();

        if($restaurant){
        $associatedFoods = $restaurant->foods->pluck('id')->toArray();

        return view('owner.modifyrestaurant')->with('logged', true)->with('loggedName', session('loggedName'))
        ->with('user_type',session('user_type'))->with('foods',$foods)->with('associatedFoods',$associatedFoods)
        ->with('restaurant',$restaurant)->with('owner',$owner);
        }
        else {
            return view('owner.modifyrestaurant')->with('logged', true)->with('loggedName', session('loggedName'))
        ->with('user_type',session('user_type'))->with('foods',$foods)->with('restaurant',$restaurant)->with('owner',$owner);
        }
    }

    public function updateRestaurant(Request $request,$id)
    {
        $dl = new DataLayer();
        $owner = $dl->getOwner(session('loggedName'));
        if ($owner == null) {
            return redirect()->route('pagenotfound');
        }

        if ($owner->id != $id) {
            return redirect()->route('user.accessdenied');
        }

        $restaurant = $dl->findRestaurantByOwnerId($owner->id);
        $oldEmail = $restaurant->email;
        
        $request->validate ([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('restaurant', 'email')->ignore($restaurant->id),
                function ($attribute, $value, $fail) use ($dl, $oldEmail, $id) {
                    if ($value !== $oldEmail && $dl->checkExistence('restaurant', 'email', $value)) {
                        $fail(':attribute must be unique.');
                    }
                },
            ],

            'phonenumber' => 'required',
            'street' => 'required',
            'city' => 'required',
            'postalcode' => 'required',
            'country' => 'required',
            'averageprice' => 'required',
            'description' => 'required',
            'food' => 'required',
        ]);

        $dl->updateRestaurant($restaurant->id,$request->name, $request->email, $request->phonenumber,
        $request->street, $request->city, $request->postalcode, $request->country, $request->description,
        $request->averageprice, $request->food);
        
        return redirect()->route('owner.myprofile',$owner->id);
    }

    public function receivedReviews(Request $request,$id)
    {
        $dl = new DataLayer();
        $owner = $dl->getOwner(session('loggedName'));
        if ($owner == null) {
            return redirect()->route('pagenotfound');
        }

        if ($owner->id != $id) {
            return redirect()->route('user.accessdenied');
        }

        $restaurant = $dl->findRestaurantByOwnerId($owner->id);
    
        if($restaurant){
            $reviews = $dl->findReviewsFromRestaurant($restaurant->id);

            if($reviews->count()!=0){
                return view('owner.receivedreviews')->with('logged', true)->with('loggedName', session('loggedName'))
                ->with('user_type',session('user_type'))->with('owner',$owner)->with('restaurant', $restaurant)->with('reviews',$reviews);
            }
            else {
                return view('owner.receivedreviews')->with('logged', true)->with('loggedName', session('loggedName'))
                ->with('user_type',session('user_type'))->with('owner',$owner)->with('restaurant', $restaurant)->with('reviews',null);
            }    
        }
        else {
            return view('owner.receivedreviews')->with('logged', true)->with('loggedName', session('loggedName'))
            ->with('user_type',session('user_type'))->with('owner',$owner)->with('restaurant',null)->with('reviews',null);
        }
       
    }

}