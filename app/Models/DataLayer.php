<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Food;
use App\Models\Customer;
use App\Models\Owner;
use App\Models\Restaurant;
use App\Models\Review;

use function PHPUnit\Framework\isEmpty;

class DataLayer 
{
    public function validUser($username, $password, $user_type) {
        if ($user_type == 'customer') {
            $user = Customer::where('username', $username)->first();
        } else if ($user_type == 'owner') {
            $user = Owner::where('username', $username)->first();
        } else {
            return null; // Return null for invalid user type
        }
    
        if ($user && md5($password) == $user->password) {
            return $user;
        }
    
        return null;
    }

    public function addCustomer($username, $password, $name, $surname, $city, $email) {
        Customer::create(['username' => $username, 'password' => md5($password), 'name'=> $name, 'surname'=> $surname,'city'=> $city, 'email' => $email]);
    }

    public function addOwner($username, $password, $name, $surname, $email) {
        Owner::create(['username' => $username, 'password' => md5($password), 'name'=> $name, 'surname'=> $surname,'email' => $email]);
    }

    public function getAllRestaurants()
    {
    return Restaurant::all();
    }

    public function getAllRestaurantsPaginate()
    {
    return Restaurant::orderBy('name')->paginate(6);
    }

    public function getIdsByImageNames($imageNames)
    {
        return Food::whereIn('image', $imageNames)->pluck('id')->toArray();
    }

    public function getReviewById($id){
        $reviews = Review::where('id',$id)->first();
        return $reviews;
    }

    public function addRestaurant($name, $email, $phonenumber, $street, $city, $postalcode, $country, $description, $average_price, $owner_id, $food_id) {
        return Restaurant::create(['name' => $name, 'email' => $email, 'phonenumber' => $phonenumber ,'street' => $street, 'city' => $city, 'postalcode' => $postalcode, 'country' => $country, 'description' => $description,'averageprice' => $average_price, 'owner_id' => $owner_id, 'food_id' => $food_id]);
    }

    public function getCustomer($username){
        $customer = Customer::where('username', $username)->first();
        return $customer;
    }

    public function getCustomerbyID($id) {
        $users = Customer::where('id',$id)->first();
        return $users;
    } 
    
    public function getCustomerId($username) {
        $users = Customer::where('username',$username)->get(['id']);
        return $users->id;
    }

    public function getFoodId($name) {
        $food = Food::where('name', $name)->first(['id']);
        return $food; 
    }

    public function getOwner($username) {
        $owner = Owner::where('username',$username)->first();
        return $owner;
    }

    public function getOwnerbyID($id) {
        $users = Owner::where('id',$id)->first();
        return $users;
    } 

    public function getOwnerId($username) {
        $users = Owner::where('username',$username)->get(['id']);
        return $users->id;
    }

    // public function getRecommendedRestaurants($customerId, $city) {
    //     $customerFoodPreferences = DB::table('customer_food')
    //         ->where('customer_id', $customerId)
    //         ->pluck('food_id');
    
    //     $matchingRestaurants = Restaurant::whereIn('id', function ($query) use ($customerFoodPreferences) {
    //         $query->select('restaurant_id')
    //             ->from('restaurant_food')
    //             ->whereIn('food_id', $customerFoodPreferences);
    //     })
    //     ->where('city', $city)
    //     ->get();
    
    //     $associatedRestaurants = DB::table('restaurant_customer')
    //         ->where('customer_id', $customerId)
    //         ->pluck('restaurant_id');
    
    //     $filteredRestaurants = $matchingRestaurants->whereNotIn('id', $associatedRestaurants);
    
    //     return $filteredRestaurants;
    // }

    public function getFoodFromRestaurant($id){
        $restaurant = Restaurant::where('id',$id)->first();
        if($restaurant){}
        $food = Food::where('id',$restaurant->food_id)->first();
        return $food;
    }

    public function findRestaurantByID($id){
        $restaurant = Restaurant::where('id',$id)->first();
        return $restaurant;
    }

    public function listBestRestaurants() {
        $restaurants = Restaurant::select('restaurant.*')
            ->join('review', 'restaurant.id', '=', 'review.restaurant_id')
            ->groupBy('restaurant.id')
            ->havingRaw('AVG(review.score) >= ?', [4])
            ->orderByRaw('AVG(review.score) DESC')
            ->limit(12)
            ->get();
    
        return $restaurants;
    }

    public function listSearchRestaurants($query)
{
    $food = Food::where('name', 'like', "%$query%")->first();
    if ($food) {
        $foodID = $food->id;

        $matchingRestaurants = Restaurant::where('name', 'like', "%$query%")
        ->orWhere('city', 'like', "%$query%")
        ->orWhere('food_id', 'like', $foodID);
    }
    else {
        $matchingRestaurants = Restaurant::where('name', 'like', "%$query%")
        ->orWhere('city', 'like', "%$query%");
    }
 
    if ($matchingRestaurants->count() === 0) {
        return null;
    }

    return $matchingRestaurants->paginate(10);
}

    public function getFood(){
        $food = Food::all();
        return $food;
    }

    // public function filterRestaurants($city, $food, $price, $rating, $sortColumn)
    // {
    //     $restaurantsQuery = Restaurant::query();

    //     // Filter by city
    //     if ($city) {
    //         $restaurantsQuery->where('city', 'like', "%$city%");
    //     }

    //     // Filter by food
    //     if ($food) {
    //         $foodID = Food::where('name', 'like', "%$food%")
    //             ->pluck('id')
    //             ->toArray();

    //         $restaurantsQuery->whereHas('food', function ($query) use ($foodID) {
    //             $query->whereIn('id', $foodID);
    //         });
    //     }

    //     // filter by price range
    //     if ($price) {
    //         $restaurantsQuery->where('average_price', 'like', "%$price%");
    //     }

    //     // Filter by rating
    //     if ($rating) {
    //         $restaurantsQuery->whereHas('review', function ($query) use ($rating) {
    //             $query->havingRaw('AVG(rating) >= ?', [$rating]);
    //         });
    //     }

    //     $matchingRestaurants = $restaurantsQuery->get();

    //     $blockFactor = 10;
    //     $sorts = explode(',', $sortColumn);
    //     $query = Restaurant::query();
    //     foreach ($sorts as $sortCriterium) {
    //         $sortDirection = str_starts_with($sortCriterium, '-') ? 'desc' : 'asc';
    //         $sortCriterium = ltrim($sortCriterium, '-');
    //         $query->orderBy($sortCriterium, $sortDirection);
    //     }
    //     $matchingRestaurants = $query->paginate($blockFactor);

    //     if ($matchingRestaurants->isEmpty()) {
    //         return response()->json(['message' => 'No matching restaurants found.']);
    //         }

    //     return $matchingRestaurants;
    // }

    public function getAvgScores($id){
        $averageScore = Review::where('restaurant_id', $id)->avg('score');
        $menuScore = Review::where('restaurant_id', $id)->avg('menu_score');
        $serviceScore = Review::where('restaurant_id', $id)->avg('service_score');
        $billScore = Review::where('restaurant_id', $id)->avg('bill_score');
        $locationScore = Review::where('restaurant_id', $id)->avg('location_score');
        return [$averageScore, $menuScore, $serviceScore, $billScore,$locationScore];
    }

    public function countReviews($id){
        $num_reviews = Review::where('restaurant_id', $id)->count();
        return $num_reviews;
    }

    public function findReviewsFromRestaurant($id){
        $query = Review::where('restaurant_id', $id)
            ->orderByDesc('date')->paginate(9);
    
        return $query;
    }

    public function findReviewsFromCustomer($id){
        $query = Review::where('customer_id', $id)
            ->orderByDesc('date')->paginate(3);
        
            return $query;
    }

    public function checkExistence($user_type, $feature, $value){
        if ($user_type == 'customer') {
            return Customer::where($feature, $value)->exists();
        } else if ($user_type == 'owner') {
            return Owner::where($feature, $value)->exists();
        }
    }

    // public function searchRestaurantsByFoodAndCity($foodId, $city){

    //     $restaurantFoodIds = DB::table('restaurant_food')
    //     ->where('food_id', $foodId)
    //     ->pluck('restaurant_id')
    //     ->toArray();

    //     $restaurants = Restaurant::whereIn('id', $restaurantFoodIds)
    //     ->where('city', $city)
    //     ->get();

    // return $restaurants;
    // }
    
    public function searchRestaurantsByFood($foodId)
    {     
        return Restaurant::where('food_id', 'like', $foodId)->orderBy('name')->paginate(6);
    }


    // public function searchRestaurantsByCity($city){
    //     $restaurants = Restaurant::where('city', $city)
    //     ->get();

    //     return $restaurants; 
    // }

    
    public function updateCustomerPassword($id, $password){
        Customer::where('id',$id)->update(['password' => md5($password)]);
    }

    public function updateOwnerPassword($id, $password){
        Owner::where('id',$id)->update(['password' => md5($password)]);
    }

    public function deleteCustomer($id){
        $customer = Customer::where('id',$id)->first();
        $customer->restaurants()->detach();
        $customer->delete();
    }

    public function deleteRestaurantFromPivot($id){
        $restaurant = Restaurant::where('owner_id', $id);
        if ($restaurant){
            $restaurant->delete();
        }
    }

   public function deleteReviewFromPivot($id){
        $review = Review::where('customer_id',$id);
        if ($review){
            $review->delete();
        }
   }

    public function deleteOwner($id){
        Owner::where('id',$id)->delete();
    }

    public function findRestaurantByOwnerId($id){
        $restaurant = Restaurant::where('owner_id', $id)->first();
        return $restaurant;
    }

    public function deleteReview($id){
        Review::where('id',$id)->delete();
    }

    public function updateRestaurant($id, $name, $email, $phonenumber, $street, $city, $postalcode, $country, $description, $averageprice, $foodId){
        Restaurant::where('id',$id)->update(['name' => $name, 'email' => $email, 'phonenumber' => $phonenumber, 'street' => $street, 'city'=>$city, 'postalcode'=>$postalcode,'country'=>$country,'description'=> $description, 'averageprice' => $averageprice, 'food_id' => $foodId]);
    }

    public function addReview($score, $menuscore, $servicescore, $billscore, $locationscore, $comment, $customerid, $restaurantid) {

        $date = Carbon::today();

        Review::create(['score' => $score, 'menu_score' => $menuscore, 'service_score'=> $servicescore, 'bill_score'=> $billscore,'location_score'=> $locationscore, 'date' => $date, 'comment' => $comment, 'customer_id' => $customerid, 'restaurant_id' => $restaurantid]);
    }

    public function updateReview ($reviewId, $score, $menu_score, $service_score, $bill_score, $location_score, $comment, $customer, $restaurant_id){
        $date = Carbon::today();

        Review::where('id',$reviewId)
        ->update(['score' => $score, 'menu_score' => $menu_score,'service_score' => $service_score, 
        'bill_score' => $bill_score,  'location_score' => $location_score, 'date' => $date, 
        'comment' => $comment, 'customer_id' => $customer, 'restaurant_id' => $restaurant_id]);
    }

    public function updateOwner($id, $name, $surname, $username, $email){
        Owner::where('id',$id)->update(['username'=>$username, 'email'=>$email,'name'=>$name, 'surname'=>$surname ]);
    }

    public function updateCustomer($id, $name, $surname, $username, $email, $city){

        Customer::where('id',$id)->update(['username'=>$username, 'email'=>$email,'name'=>$name, 'surname'=>$surname, 'city'=>$city ]);
    }
        

}