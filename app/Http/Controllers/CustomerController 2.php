<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use App\Models\DataLayer;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CustomerController extends Controller
{

    public function myProfile() {
        $dl = new DataLayer();

        $customer = $dl->getCustomer(session('loggedName'));

        if (!empty($customer)){
            return view('customer.customerprofile')->with('logged', true)->with('loggedName', session("loggedName"))
            ->with('user_type',session('user_type'))->with('customer',$customer);
        }
        else{
            return redirect()->back()->withInput()->withErrors(['user_type' => 'Invalid user type']);
        }
             
    }

    public function settings()
    {
        $dl = new DataLayer();
        $customer = $dl->getCustomer(session('loggedName'));

        if (!empty($customer)){
            return view('customer.customersettings')->with('logged', true)->with('loggedName', session('loggedName'))
             ->with('user_type',session('user_type'))->with('customer',$customer);
        }
        else{
            return redirect()->back()->withInput()->withErrors(['user_type' => 'Invalid user type']);
        }    
    }

    public function updateProfile(Request $request,$id)
    {
        $dl = new DataLayer();
        $customer = $dl->getCustomer(session('loggedName'));
        if ($customer == null) {
            return redirect()->route('pagenotfound');
        }

        if ($customer->id != $id) {
            return redirect()->route('user.accessdenied');
        }

        $oldUsername = $customer->username;
        $oldEmail = $customer->email;

        $request->validate([
            'username' => [
                'required',
                Rule::unique('customer', 'username')->ignore($customer->id),
                function ($attribute, $value, $fail) use ($dl, $oldUsername, $id) {
                    if ($value !== $oldUsername && $dl->checkExistence('customer', 'username', $value)) {
                        $fail(':attribute must be unique.');
                    }
                },
            ],

            'email' => [
                'required',
                'email',
                Rule::unique('customer', 'email')->ignore($customer->id),
                function ($attribute, $value, $fail) use ($dl, $oldEmail, $id) {
                    if ($value !== $oldEmail && $dl->checkExistence('customer', 'username', $value)) {
                        $fail(':attribute must be unique.');
                    }
                },
            ],
            'name' => 'required',
            'surname' => 'required',
            'city' => 'required'
        ]);

        $dl->updateCustomer($customer->id, $request->name, $request->surname, $request->username, $request->email, $request->city);

        session(['loggedName' => $request->username]);

        return redirect()->route('customer.myprofile',$customer->id);
    }

    public function passwordUpdate(Request $request,$id){
        $dl = new DataLayer();
        $customer = $dl->getCustomer(session('loggedName'));
        if ($customer == null) {
            return redirect()->route('pagenotfound');
        }
        if ($customer->id != $id) {
            return redirect()->route('user.accessdenied');
        }

        $oldPassword = $customer->password;
        
        if($oldPassword != md5($request->oldpassword)){
            $message=['oldpassword' => 'password errata'];
            return Redirect::to(route('customer.settings'))->withInput()->withErrors($message);
        }
        
            $request -> validate([
                'password' => 'required|min:8',
                'password-confirmation' => 'required|same:password'
            ]);

        $dl->updateCustomerPassword($customer->id, $request->password);
        return redirect()->route('customer.myprofile', $customer->id);

    }


    public function goToDelete(Request $request,$id)
    {
        $dl = new DataLayer();
        $customer = $dl->getCustomer(session('loggedName'));
        if ($customer == null) {
            return redirect()->route('pagenotfound');
        }
        if ($customer->id != $id) {
            return redirect()->route('user.accessdenied');
        }
        return view('customer.deleteprofile', ['id' => $id, 'logged' => true, 'user_type' => 'customer']);
    }

    public function destroy(Request $request,$id)
    {
        $dl = new DataLayer();
        $customer = $dl->getCustomer(session('loggedName'));
        if ($customer == null) {
            return redirect()->route('pagenotfound');
        }
        if ($customer->id != $id) {
            return redirect()->route('user.accessdenied');
        }

        $dl->deleteReviewFromPivot($id);
        $dl->deleteCustomer($id);

        Auth::logout();
 
        $request->session()->invalidate();

        return redirect()->route('home');
    }

    public function myReviews(Request $request,$id)
    {
        $dl = new DataLayer();
        $reviews = $dl->findReviewsFromCustomer($id);
        $customer = $dl->getCustomer(session('loggedName'));

        if ($customer == null) {
            return redirect()->route('pagenotfound');
        }

        if ($customer->id != $id) {
            return redirect()->route('user.accessdenied');
        }

        if($reviews->count()!=0){
            return view('customer.myreviews')->with('logged', true)->with('loggedName', session('loggedName'))
            ->with('user_type',session('user_type'))->with('reviews',$reviews)->with('customer',$customer);
        }
        else{
            return view('customer.myreviews')->with('logged', true)->with('loggedName', session('loggedName'))
            ->with('user_type',session('user_type'))->with('reviews',null)->with('customer',$customer);
        }

    }

    public function writeReview(Request $request,$id)
    {
        $dl = new DataLayer();
        $restaurants = $dl->getAllRestaurants();
        $customer = $dl->getCustomer(session('loggedName'));
        
        if ($customer == null) {
        return redirect()->route('pagenotfound');
       }
       
       if ($customer->id != $id) {
        return redirect()->route('user.accessdenied');
       }

        return view('customer.writereview')->with('logged', true)->with('loggedName', session('loggedName'))
            ->with('user_type',session('user_type'))->with('restaurants',$restaurants)->with('customer',$customer);
    }

    public function reviewSubmit(Request $request, $id)
    {

        $dl = new DataLayer();
        $customer = $dl->getCustomer(session('loggedName'));

        if ($customer == null) {
            return redirect()->route('pagenotfound');
        }
           
        if ($customer->id != $id) {
            return redirect()->route('user.accessdenied');
        }
                $request->validate([
                    'score' => 'required',
                    'menu_score' => 'required',
                    'service_score'=> 'required',
                    'bill_score'=> 'required',
                    'location_score'=> 'required',
                    'comment' => 'required', 
                    'restaurant_id' => 'required',
                ]);

                $dl->addReview($request->input('score'), $request->input('menu_score'), $request->input('service_score'), 
                $request->input('bill_score'), $request->input('location_score'), $request->input('comment'),
                $customer->id,$request->input('restaurant_id'));
               
                return view('customer.customerprofile')->with('logged', true)->with('loggedName', session('loggedName'))
                ->with('user_type',session('user_type'))->with('customer',$customer);
    }

    public function modifyReview($customerId,$reviewId)
    {
    $dl = new DataLayer();
    $review = $dl->getReviewById($reviewId); 
    $restaurants = $dl->getAllRestaurants();
    $customer = $dl->getCustomer(session('loggedName'));

    if ($customer == null) {
        return redirect()->route('pagenotfound');
    }

    if ($customer->id != $customerId) {
        return redirect()->route('user.accessdenied');
    }
        return view('customer.modifyreview')->with('logged', true)->with('loggedName', session('loggedName'))
        ->with('user_type', session('user_type'))->with('customer', $customer)->with('review', $review)->with('restaurants', $restaurants); 
    }

    public function modifiedReviewSubmit(Request $request,$id,$review_id)
    {
        $dl = new DataLayer();
        $customer = $dl->getCustomer(session('loggedName'));
        if ($customer == null) {
            return redirect()->route('pagenotfound');
        }

        if ($customer->id != $id) {
            return redirect()->route('user.accessdenied');
        }

        $dl->updateReview($review_id, $request->score,$request->menu_score, $request->service_score, $request->bill_score,
        $request->location_score, $request->comment, $customer->id, $request->restaurant_id);
        
        return redirect()->route('customer.myprofile',$customer->id);
    }

public function goToDeleteReview(Request $request,$id,$review_id)
{
    $dl = new DataLayer();
    $customer = $dl->getCustomer(session('loggedName'));
    if ($customer == null) {
        return redirect()->route('pagenotfound');
    }
    if ($customer->id != $id) {
        return redirect()->route('user.accessdenied');
    }
    return view('customer.deletereview')->with('logged',true)->with('user_type','customer')->with('id',$id)
    ->with('review_id',$review_id);
}

    public function destroyReview (Request $request,$id, $review_id)
    {
        $dl = new DataLayer();
        $customer = $dl->getCustomer(session('loggedName'));
        if ($customer == null) {
            return redirect()->route('pagenotfound');
        }
        if ($customer->id != $id) {
            return redirect()->route('user.accessdenied');
        }

        $dl->deleteReview($review_id);
        return redirect()->route('customer.myreviews', ['id' => $id]);
    }
}