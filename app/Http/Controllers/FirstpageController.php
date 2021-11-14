<?php

namespace App\Http\Controllers;

use App\Models\Order_drink;
use App\Models\Drink;
use App\Models\Pizza;

use Illuminate\Http\Request;

class FirstpageController extends Controller
{
    public function index() {
        $drinks = Drink::latest()->get();
        $pizzas = Pizza::latest()->get();
        return view('firstpage',compact('drinks','pizzas'));
    }
}
