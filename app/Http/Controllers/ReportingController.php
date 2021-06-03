<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use Carbon\Carbon;
class ReportingController extends Controller
{
    protected $request;
    public function __construct(Request $request){

        $this->request = $request;
    }
    public function index(){
     return view('index')->with([
         'total_number_of_customer'=> Customer::count(),
         'total_number_of_customer_mobile_app'=> Customer::whereDevice('app')->count(),
         'total_number_of_customer_mobile_browser'=> Customer::whereDevice('browser')->count(),
         'female_customer'=>Customer::whereGender('Female')->count(),
         'male_customer'=>Customer::whereGender('Male')->count(),
         'age'=>[
             'child'=>Customer::whereBetween('age',[0,12])->count(),
             'adolescence'=>Customer::whereBetween('age',[13,18])->count(),
             'adult'=>Customer::whereBetween('age',[19,59])->count(),
             'senior'=>Customer::where('age','>=','60')->count()
             
         ],
         'country' =>[
         'ASIA'=>Customer::whereCountry('ASIA')->count(),
         'EUROPE'=>Customer::whereCountry('EUROPE')->count(),
         'US'=>Customer::whereCountry('US')->count(),
         'AUSTRALIA'=>Customer::whereCountry('AUSTRALIA')->count()
        ]
         
     ]);

    }
    public function order(){
        $data=[
            'total_earned'=>Order::sum('total'),
            'avg_order_total'=>Order::avg('total'),
            'category'=>[
                'Toys'=> Order::whereCategory('Toys')->count(),
                'Book'=> Order::whereCategory('Book')->count(),
                'Home Supplies'=> Order::whereCategory('Home Supplies')->count(),
                'Accessories'=> Order::whereCategory('Accessories')->count(),
                'Gadgets' => Order::whereCategory('Gadgets')->count(),
                'Food' => Order::whereCategory('Food')->count(),
                'Appliances' => Order::whereCategory('Appliances')->count()
 
            ],
            'status'=>[
                'processing'=> Order::whereStatus('processing')->count(),
                'shipped'=> Order::whereStatus('shipped')->count(),
                'delivered'=> Order::whereStatus('delivered')->count(),
                'canceled'=> Order::whereStatus('canceled')->count()
            ],
            'promo'=>[
                'used'=>Order::wherePromo('1')->count(),
                'not_used'=>Order::wherePromo('0')->count()
            ],
            'order_date'=>[
                '1'=>Order::whereBetween('order_date', [
                    Carbon::parse('2021-01-01')->subYears(10),
                    Carbon::parse('2021-12-31')->subYears(10)])->count(),
                '2'=>Order::whereBetween('order_date', [
                    Carbon::parse('2021-01-01')->subYears(9),
                    Carbon::parse('2021-12-31')->subYears(9)])->count(),
                '3'=>Order::whereBetween('order_date', [
                    Carbon::parse('2021-01-01')->subYears(8),
                    Carbon::parse('2021-12-31')->subYears(8)])->count(),
                '4'=>Order::whereBetween('order_date', [
                    Carbon::parse('2021-01-01')->subYears(7),
                    Carbon::parse('2021-12-31')->subYears(7)])->count(),
                '5'=>Order::whereBetween('order_date', [
                    Carbon::parse('2021-01-01')->subYears(6),
                    Carbon::parse('2021-12-31')->subYears(6)])->count(),
                '6'=>Order::whereBetween('order_date', [
                    Carbon::parse('2021-01-01')->subYears(5),
                    Carbon::parse('2021-12-31')->subYears(5)])->count(),
                '7'=>Order::whereBetween('order_date', [
                    Carbon::parse('2021-01-01')->subYears(4),
                    Carbon::parse('2021-12-31')->subYears(4)])->count(),
                '8'=>Order::whereBetween('order_date', [
                    Carbon::parse('2021-01-01')->subYears(3),
                    Carbon::parse('2021-12-31')->subYears(3)])->count(),
                '9'=>Order::whereBetween('order_date', [
                    Carbon::parse('2021-01-01')->subYears(2),
                    Carbon::parse('2021-12-31')->subYears(2)])->count(),
                '10'=>Order::whereBetween('order_date', [
                    Carbon::parse('2021-01-01')->subYears(1),
                    Carbon::parse('2021-12-31')->subYears(1)])->count(),
                '0'=>Order::whereBetween('order_date', [
                    Carbon::parse('2021-01-01'),
                    Carbon::parse('2021-12-31')])->count()
            ]
        ];
        dd($data);
    }
    public function num3(){
        
    }
    public function num4(){
        
    }
    public function num5(){
        
    }
    
}
