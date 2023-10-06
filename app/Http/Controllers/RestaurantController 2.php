<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\DataLayer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class RestaurantController extends Controller
{
    public function restaurantsList(Request $request)
    {
        $dl = new DataLayer();
        $id = $request->input('food_id');
        if($id){
            $restaurants = $dl->searchRestaurantsByFood($id);
        }
        else{
            $restaurants = $dl->getAllRestaurantsPaginate();
        }
        
        if (session()->has('logged')) {
            return view('restaurant.restaurantslist')->with('logged', true)->with('loggedName', session('loggedName'))->with('user_type', session('user_type'))
            ->with('restaurants',$restaurants);
        } else {
            return view('restaurant.restaurantslist')->with('logged', false)->with('restaurants',$restaurants);
        }

    }
    
    public function restaurantsSearch(Request $request)
    {
        $dl = new DataLayer();
        $query = $request->input('query');
        $matchingRestaurants = $dl->listSearchRestaurants($query);
        $restaurants = $matchingRestaurants;

        if (session()->has('logged')) {
            return view('restaurant.restaurantslist')->with('logged', true)->with('loggedName', session('loggedName'))->with('user_type', session('user_type'))
            ->with('restaurants',$restaurants);
        } else {
            return view('restaurant.restaurantslist')->with('logged', false)->with('restaurants',$restaurants);
        }
    }

    // public function indexRestaurantsSearch(Request $request)
    // {
    // $dl = new DataLayer();
    // $foodId = $request->input('food_id');
    // $city = $request->input('city');

    // if ($foodId && $city) {
    //     $matchingRestaurants = $dl->searchRestaurantsByFoodAndCity($foodId, $city);
    // } elseif ($foodId) {
    //     $matchingRestaurants = $dl->searchRestaurantsByFood($foodId);
    // } elseif ($city) {
    //     $matchingRestaurants = $dl->searchRestaurantsByCity($city);
    // } else {
    //     $matchingRestaurants = $dl->getAllRestaurantsPaginate('best_avg_score');
    // }
    
    // $food = $dl->getFood();

    // if (session()->has('logged')) {
    //     return view('restaurant.restaurantresults')->with('logged', true)->with('loggedName', session('loggedName'))->with('user_type', session('user_type'))
    //         ->with('matchingrestaurants', $matchingRestaurants)->with('food', $food);
    // } else {
    //     return view('restaurant.restaurantresults')->with('logged', false)->with('matchingrestaurants', $matchingRestaurants)->with('food', $food);
    // }
    // }

    public function showDetails($id)
    {
        $dl = new DataLayer();
        $restaurant = $dl->findRestaurantByID($id);
        [$averageScore, $menuScore, $serviceScore, $billScore, $locationScore] = $dl->getAvgScores($id);
        $reviewCount = $dl->countReviews($id);
        $food = $dl->getFoodFromRestaurant($id);

        $reviews = $dl->findReviewsFromRestaurant($id);

        if (session()->has('logged') && session('user_type')=='customer'){
            $customername = session('loggedName');
            $customer = $dl->getCustomer($customername);
            $isFavorite = false;
            $isFavorite = $restaurant->customers->contains($customer->id);
            return view('restaurant.restaurantdetails')->with('logged', true)->with('loggedName', session('loggedName'))->with('user_type', session('user_type'))
            ->with('customer',$customer)->with('restaurant',$restaurant)->with('food',$food)->with('isFavorite',$isFavorite)->with('averageScore',$averageScore)->with('reviewCount',$reviewCount)->with('menuScore',$menuScore)
            ->with('serviceScore',$serviceScore)->with('billScore',$billScore)->with('locationScore',$locationScore)->with('reviews',$reviews);
        }

        if (session()->has('logged')) {
            return view('restaurant.restaurantdetails')->with('logged', true)->with('loggedName', session('loggedName'))->with('user_type', session('user_type'))
            ->with('restaurant',$restaurant)->with('food',$food)->with('averageScore',$averageScore)->with('reviewCount',$reviewCount)->with('menuScore',$menuScore)
            ->with('serviceScore',$serviceScore)->with('billScore',$billScore)->with('locationScore',$locationScore)->with('reviews',$reviews);
        } else {
            return view('restaurant.restaurantdetails')->with('logged', false)->with('restaurant',$restaurant)->with('food',$food)->with('averageScore',$averageScore)->with('reviewCount',$reviewCount)
            ->with('menuScore',$menuScore)->with('serviceScore',$serviceScore)->with('billScore',$billScore)->with('locationScore',$locationScore)->with('reviews',$reviews);
        }
    }


    public function toggleFavorite($id)
    {
        $dl = new DataLayer();
        $restaurant = $dl->findRestaurantByID($id);
        $customername = session('loggedName');
        $customer = $dl->getCustomer($customername);

        if ($customer) {
            if ($restaurant->customers->contains($customer->id)) {
                $restaurant->customers()->detach($customer->id);
            } else {
                $restaurant->customers()->attach($customer->id); 
            }
        }

        return back();
    }

    public function favoriteRestaurants(Request $request, $id){
        $dl = new DataLayer();
        $customer = $dl->getCustomerbyID($id);

        $associatedrestaurants = $customer->restaurants()->getQuery();

        if ($associatedrestaurants->count()!=0){
            $associatedrestaurants = $associatedrestaurants->paginate(4);
            return view('customer.favoriterestaurants')->with('logged', true)->with('loggedName', session('loggedName'))->with('user_type', session('user_type'))
            ->with('customer', $customer)->with('associatedrestaurants',$associatedrestaurants);
        }
        else {
            return view('customer.favoriterestaurants')->with('logged', true)->with('loggedName', session('loggedName'))->with('user_type', session('user_type'))
            ->with('customer', $customer)->with('associatedrestaurants',null);
        }

       
    }

}