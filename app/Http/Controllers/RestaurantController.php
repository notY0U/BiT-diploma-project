<?php

namespace App\Http\Controllers;

use Validator;
use App\Menu;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $menus=Menu::OrderBy('title')->get();
        $active = 0;
        
        if ($request->show_menu_id) {
            $restaurants = Restaurant::where('menu_id', $request->show_menu_id)->get();
            $active = (int) $request->show_menu_id;
        }else{

            $restaurants = Restaurant::all();
        }
        return view('restaurant.index', ['restaurants' => $restaurants,'menus' => $menus, 'active' => $active]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus=Menu::OrderBy('weight')->get();
        return view('restaurant.create', ['menus' => $menus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $validator = Validator::make($request->all(),
       [
           'restaurant_title' => ['required', 'min:3', 'max:64'],
           'restaurant_customers' => ['required', 'numeric'],
           'restaurant_employees' => ['required', 'numeric'],
       ]
       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }
        $restaurant = new Restaurant;
        $restaurant->title = $request->restaurant_title;
        $restaurant->customers = $request->restaurant_customers;
        $restaurant->employees = $request->restaurant_employees;
        $restaurant->menu_id = $request->menu_id;
        if ((int) $request->menu_id == 0){
            return redirect()->
            route('restaurant.create')->
            with('info_message','Must have dish of the day');
        }
        $restaurant->save();
        return redirect()->route('restaurant.index')->with('success_message', 'Addition successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $menus=Menu::all();
        return view('restaurant.edit', ['restaurant' => $restaurant,'menus' => $menus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $validator = Validator::make($request->all(),
       [
           'restaurant_title' => ['required', 'min:3', 'max:64'],
           'restaurant_customers' => ['required', 'numeric'],
           'restaurant_employees' => ['required', 'numeric'],
       ]
       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }
        $restaurant->title = $request->restaurant_title;
        $restaurant->customers = $request->restaurant_customers;
        $restaurant->employees = $request->restaurant_employees;
        $restaurant->menu_id = $request->menu_id;
        // dd($request->menu_id);
        if($request->menu_id ==0){
            return redirect()->
            back('restaurant.create')->
            with('info_message','Must have dish of the day');
        }
        $restaurant->save();
        return redirect()->route('restaurant.index')->with('success_message', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        
        $restaurant->delete();
        return redirect()->route('restaurant.index')->with('success_message', 'Deleted successfully');;
    }
}
