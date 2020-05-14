

@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
                <div class="card-header">DISHES
                  {{-- <small>SORT</small>
                  <small>by surname:</small>
                  <a href="{{route('menu.index', ['order' => 'desc', 'by' => 'surname'])}}" style='text-decoration: none;'>
                  <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                  </a>
                  <a href="{{route('menu.index', ['order' => 'asc', 'by' => 'surname'])}}" style='text-decoration: none;'>
                  <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/><path d="M0 0h24v24H0V0z" fill="none"/></svg>
                  </a>
                 <small>by name:</small>
                  <a href="{{route('menu.index', ['order' => 'desc', 'by' => 'name'])}}" style='text-decoration: none;'>
                  <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                  </a>
                  <a href="{{route('menu.index', ['order' => 'asc', 'by' => 'name'])}}" style='text-decoration: none;'>
                  <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/><path d="M0 0h24v24H0V0z" fill="none"/></svg>
                  </a>|
                  <a href="{{route('menu.index')}}" style="color:black"><small> clear sorting</small>
                  </a>
                 </div> --}}


              </div>

               <div class="card-body">
                @foreach ($menus as $menu)
                <a href="{{route('menu.edit',[$menu])}}">{{$menu->title}} </a>
                price: {{$menu->price}} Eur
                <div style="display:flex">
                <form method="GET" action="{{route('menu.pdf', [$menu])}}">
                 @csrf
                 <button type="submit">download PDF</button>
                </form>
                <form method="GET" action="{{route('menu.edit', [$menu])}}">
                 @csrf
                 <button type="submit">EDIT</button>
                </form>
                
                <form method="POST" action="{{route('menu.destroy', [$menu])}}">
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

