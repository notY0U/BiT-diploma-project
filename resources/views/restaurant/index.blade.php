

@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               
                <div class="card-header">Restaurants 
                  <form action="{{route('restaurant.index')}}" method="get">
                    <select name="show_menu_id">
                      <option value="0">Choose a dish..</option>
                      @foreach ($menus as $menu)
                          <option value="{{$menu->id}}" @if($menu->id == $active) selected @endif>{{$menu->title}} {{$menu->price}}</option>
                      @endforeach
                    </select>
                    <button type="submit">Filter</button>
                    <a href="{{route('restaurant.index')}}" style="text-decoration:none; color:grey"><small>clear filter</small></a>
                  </form>
                
                 </div>


               <div class="card-body">
                @foreach ($restaurants as $restaurant)
               <strong>
                 {{$restaurant->title}}
                 </strong> 
              | Seats: {{$restaurant->customers}} | dish of day: {{$restaurant->restaurantMenu->title}}
               <div style="display:flex">
                <form method="GET" action="{{route('restaurant.edit', [$restaurant])}}">
                 @csrf
                 <button type="submit">EDIT</button>
                </form>
                
                <form method="POST" action="{{route('restaurant.destroy', [$restaurant])}}">
                 @csrf
                 <button type="submit">DELETE</button>
                </form>
              </div>

                <br>
              @endforeach
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

