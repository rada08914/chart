<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Customer;
use Faker\Factory;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <=1000 ; $i++) { 
            # code...
            $faker =Factory::create();
            $country =[
                'ASIA','EUROPE','US','AUSTRALIA'
            ];
            $gender =[
                'Male','Female'
            ];
            $device=[
                'app','browser'
            ];
            $customer=Customer::create([
                'full_name'=>$faker->name(),
                'country'=>$faker->randomElement($country),
                'age'=>$faker->numberBetween(1,80),
                'gender'=>$faker->randomElement($gender),
                'device'=>$faker->randomElement($device)
              
            ]);
            $category =[
                'Toys','Book','Home Supplies','Accessories','Gadgets','Food','Appliances'
             ];
             $status =[
                'processing','shipped','delivered','canceled'
             ];
            $order=Order::create([
            'customer_id'=> $customer->id,
            'total'=>$faker->randomFloat(2, 100, 100000),
            'category'=>$faker->randomElement($category),
            'promo'=>$faker->boolean(50),
            'status'=>$faker->randomElement($status),
            'order_date'=>$faker->dateTimeBetween('-10 years')
            ]);
        }
    }
}
