<?php

namespace App\Http\Controllers;


use App\Models\Drink;
use App\Http\Requests\DrinkStoreRequest;
use App\Http\Requests\DrinkUpdateRequest;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drinks = Drink::paginate(5);
        return view('drink.index',compact('drinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drink.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DrinkStoreRequest $request)
    {
        $path = $request->image->store('public/drink');
        Drink::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'small_drink_price'=> $request->small_drink_price,
            'medium_drink_price'=> $request->medium_drink_price,
            'large_drink_price'=> $request->large_drink_price,
            'category'=> $request->category,
            'image'=> $path,
        ]);
        return redirect()->route('drink.index')->with('message','Drink added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $drink = Drink::find($id);
        return view('drink.edit',compact('drink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DrinkUpdateRequest $request, $id)
    {
       $drink = Drink::find($id);
        
       if ($request->has('image')){
           $path = $request->image->store('public/drink');
       }else{
         $path = $drink->image;
       }
 
       $drink->fill($request->input());
       $drink->name = $request->name;
       $drink->description = $request->description;
       $drink->small_drink_price = $request->small_drink_price;
       $drink->medium_drink_price = $request->medium_drink_price;
       $drink->large_drink_price = $request->large_drink_price;
       $drink->category = $request->category;
       $drink->image = $path;
       $drink->save();
 
       return redirect()->route('drink.index')->with('message','Drink updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Drink::find($id) -> delete();
        return redirect()->route('drink.index')->with('message','Drink updated successfully!');
    }
}
