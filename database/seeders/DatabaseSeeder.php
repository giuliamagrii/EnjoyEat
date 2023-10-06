<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\DataLayer;
use App\Models\Food;
use App\Models\Owner;
use App\Models\Restaurant;
use App\Models\Review;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'username'=> 'giulia',
            'password'=> md5('giuliamagri'),
            'name'=> 'Giulia',
            'surname' => 'Magri',
            'city'=> 'Brescia',
            'email'=> 'giuly.magri@gmail.com'
        ]);

        Owner::create([
            'username' => 'filippo',
            'password' => md5('filippospada'),
            'email' => 'filippo.spada@gmail.com',
            'name' => 'Filippo',
            'surname'=> 'Spada'
        ]);

        Food::create([
            'name' => 'pizza',
            'image' => 'pizza-slice_1161623.png'
        ]);
        Food::create([
            'name' => 'sushi',
            'image' => 'sushi_3978725.png'
        ]);
        Food::create([
            'name' => 'taco',
            'image' => 'taco_537386.png'
        ]);
        Food::create([
            'name' => 'healthy',
            'image' => 'salad_5346138.png'
        ]);
        Food::create([
            'name' => 'asian',
            'image' => 'ramen_1623786.png'
        ]);
        Food::create([
            'name' => 'hamburger',
            'image' => 'burger_1161644.png'
        ]);
        Food::create([
            'name' => 'fish',
            'image' => 'fish_3280126.png'
        ]);
        Food::create([
            'name' => 'brunch',
            'image' => 'croissant_5787330.png'
        ]);
        Food::create([
            'name' => 'ice-cream',
            'image' => 'ice-cream_1046783.png'
        ]);


        $dl = new DataLayer();
        $foodIds = [];
        $foodIds[] = $dl->getFoodId('pizza');
        $foodIds[] = $dl->getFoodId('sushi');
        $foodIds[] = $dl->getFoodId('taco');
        $foodIds[] = $dl->getFoodId('healthy');
        $foodIds[] = $dl->getFoodId('asian');
        $foodIds[] = $dl->getFoodId('hamburger');
        $foodIds[] = $dl->getFoodId('fish');
        $foodIds[]= $dl->getFoodId('brunch');
        $foodIds[] = $dl->getFoodId('ice-cream');


        for ($i = 0; $i < 9; $i++) {
            $owner = Owner::factory()->create();
            $customer = Customer::factory()->create();

            $restaurant = Restaurant::factory()->create(['owner_id' => $owner->id, 'food_id' => $foodIds[$i]]);

            $review = Review::factory()->create(['customer_id' => $customer->id,'restaurant_id' => $restaurant->id]);

        }

    }
}

