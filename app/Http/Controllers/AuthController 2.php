<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
        
        return Redirect::to(route('home'));
    }

    public function authentication() {
        session_start();

        if(session('logged') == true) {
            return Redirect::to(route('user.accessdenied'));
        }
        return view('auth.login')->with('logged', false);
    }
    
    public function login(Request $request) {
        session_start();
        $dl = new DataLayer();
    
        $username = $request->username;
        $password = $request->password;
    
        $customerUser = $dl->validUser($username, $password, 'customer');
        $ownerUser = $dl->validUser($username, $password, 'owner');
    
        if ($customerUser || $ownerUser) {
            
            session(['logged' => true]);
            session(['loggedName' => $username]);
            session(['user_type' => $customerUser ? 'customer' : 'owner']);
    
            if ($customerUser) {
                $customer = $dl->getCustomer($username);
                return redirect()->route('customer.myprofile')->with('customer',$customer);
            } else {
                $owner = $dl->getOwner($username);
                return redirect()->route('owner.myprofile')->with('owner',$owner);
            }
        } else {
            session()->flash('error', 'Credenziali sbagliate');
            return redirect()->route('user.login')->withInput();
        }
    }

    
    public function registration() {
        session_start();
        if(session()->has('logged') && session('logged') == true) {
            return Redirect::to(route('user.accessdenied'));
        }
        return view('auth.subscribe')->with('logged', false);
    }

    public function register(Request $request) {
        $dl = new DataLayer();
        $user_type = $request->user_type;
        $foods = $dl->getFood(); 

        try {

            if ($user_type == 'customer'){
                $request->validate([
                    'name' => 'required',
                    'surname' => 'required',
                    'city' => 'required',
                    'username' => 'required|unique:customer,username|unique:owner,username',
                    'email' => 'required|email|unique:customer,email|unique:owner,email',
                    'password' => 'required|min:8',
                    'password-confirmation' => 'required|same:password'
                ]);

                $dl->addCustomer($request->input('username'), $request->input('password'), $request->input('name'), $request->input('surname'), $request->input('city'), $request->input('email'));

                session(['user_type' => 'customer']);
                session(['loggedName' => $request->input('username')]);
                session(['logged' => true]);
               
                return view('auth.welcomeCustomer')->with('logged', true)->with('loggedName', session("loggedName"))
                ->with('user_type',session('user_type'))->with('foods',$foods);
            } else if ($user_type == 'owner') {
                $request->validate([
                    'username' => 'required|unique:customer,username|unique:owner,username',
                    'password' => 'required|min:8',
                    'name' => 'required',
                    'surname' => 'required',
                    'email' => 'required|email|unique:customer,email|unique:owner,email',
                    'password-confirmation' => 'required|same:password'
                ]);
    
                $dl->addOwner($request->input('username'), $request->input('password'),$request->input('name'),$request->input('surname'), $request->input('email'));
               
                session(['user_type' => 'owner']);
                session(['loggedName' => $request->input('username')]);
                session(['logged' => true]);

                return view('auth.welcomeOwner')->with('logged', true)->with('loggedName', session('loggedName'))
                ->with('user_type',session('user_type'))->with('foods',$foods);
            }
            else {
                return redirect()->back()->withInput()->withErrors(['user_type' => 'Invalid user type']);
            }

        }
        catch (ValidationException $e) {
            $errorMessages = $e->validator->getMessageBag()->getMessages();
            foreach ($errorMessages as $attribute => $messages) {
                foreach ($messages as $message) {
                    $translatedMessage = trans('validation.' . $message);
                }
            }
            return Redirect::to(route('user.register'))->withInput()->withErrors($errorMessages);
        }
        
    }

    public function accessdenied(){
        return view('auth.accessDenied');    
    }

    public function pageNotFound(){
        return view('auth.pageNotFound');    
    }
}
