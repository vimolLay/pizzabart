<?php

namespace App\Http\Controllers;

use App\Models\Order_drink;
use App\Models\Drink;
use Illuminate\Http\Request;

class FrontendDrinkController extends Controller
{
    public function index(Request $request){
        if(!$request->category) {
            $drinks = Drink::latest()->get();
            return view('frontpage_drink',compact('drinks'));
        }
        $drinks = Drink::where('category',$request->category)->get();
        return view('frontpage_drink',compact('drinks'));
    }
    public function show($id) {
        $drink = Drink::find($id);
        return view('show_drink',compact('drink'));
   }
   public function store(Request $request)
    {
        if ($request->small_drink == 0 && $request->medium_drink == 0 && $request->large_drink == 0) {
            return back()->with('errmessage', 'Please order at least one drink');
        }
        if ($request->small_drink < 0 || $request->medium_drink < 0 || $request->large_drink < 0) {
            return back()->with('errmessage', 'Order should not have negative number');
        }
        Order_drink::create([
            'time' => $request->time,
            'date' => $request->date,
            'user_id' => auth()->user()->id,
            'drink_id' => $request->drink_id,
            'small_drink' => $request->small_drink,
            'medium_drink' => $request->medium_drink,
            'large_drink' => $request->large_drink,
            'body' => $request->body,
            'phone' => $request->phone
        ]);
        return back()->with('message', 'Your order was successful');

    }

    
}
