<?php

namespace App\Http\Controllers;
use Validator;
use PDF;
use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::OrderBy('price')->get();
        return view('menu.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create');
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
           'menu_title' => ['required', 'min:3', 'max:64'],
           'menu_price' => ['required', 'numeric'],
           'menu_weight' => ['required', 'numeric'],
           'menu_meat' => ['required', 'numeric'],
           'menu_about' => ['required', 'min:3', 'max:255'],
       ]
       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }
        $menu = new Menu;
        $menu->title = $request->menu_title;
        $menu->price = $request->menu_price;
        $menu->weight = $request->menu_weight;
        $menu->meat = $request->menu_meat;
        if ( $request->menu_meat >= $menu->weight){
            return redirect()->
            route('restaurant.index')->
            with('info_message','meat weight must be less then dish weight');
        }
        $menu->about = $request->menu_about;
        $menu->save();
        return redirect()->route('menu.index')->with('success_message', 'Addition successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menu.edit', ['menu' => $menu]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $validator = Validator::make($request->all(),
        [
            'menu_title' => ['required', 'min:3', 'max:64'],
            'menu_price' => ['required', 'numeric'],
            'menu_weight' => ['required', 'numeric'],
            'menu_meat' => ['required', 'numeric'],
            'menu_about' => ['required', 'min:3', 'max:255'],
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $menu->title = $request->menu_title;
        $menu->price = $request->menu_price;
        $menu->weight = $request->menu_weight;
        $menu->meat = $request->menu_meat;
        $menu->about = $request->menu_about;
        $menu->save();
        return redirect()->route('menu.index')->with('success_message', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if($menu->menuRestaurant->count()){
            return redirect()->route('menu.index')->with('info_message','Cannot delete, used by restaurant(s)');
        }
        $menu->delete();
       return redirect()->route('menu.index')->with('success_message', 'Deletion successful');
    }
    
    public function pdf(Menu $menu)
    {
        $pdf = PDF::loadView('menu.pdf', ['menu' => $menu]);
        return $pdf->download('dish.pdf');
    }
}
