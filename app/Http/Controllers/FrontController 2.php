<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use App\Models\Food;

class FrontController extends Controller
{
    public function getHome()
    {
        $dl = new DataLayer();
        session_start();
        $foods = $dl->getFood();
        $bestrestaurants = $dl->listBestRestaurants();

        if (session()->has('logged')) {
            $customer = $dl->getCustomer(session('loggedName'));
            $owner = $dl->getOwner(session('loggedName'));
            if($customer){
            return view('index')->with('logged', true)->with('loggedName', session('loggedName'))->with('user_type', session('user_type'))
            ->with('foods',$foods)->with('bestrestaurants',$bestrestaurants)->with('customer',$customer);
            }
            else{
                return view('index')->with('logged', true)->with('loggedName', session('loggedName'))->with('user_type', session('user_type'))
            ->with('foods',$foods)->with('bestrestaurants',$bestrestaurants)->with('owner',$owner);
            }
        } else {
            return view('index')->with('logged', false)->with('foods',$foods)->with('bestrestaurants',$bestrestaurants);
        }
    }
}