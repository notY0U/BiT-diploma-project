

 @extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">CREATE NEW Restaurant</div>

               <div class="card-body">
                <form method="POST" action="{{route('restaurant.store')}}" enctype="multipart/form-data">
              
                <div class="form-group">
                    <label>Title</label>
                  <input type="text" class="form-control" name="restaurant_title" class="form-control" value="{{old('restaurant_title')}}">
                  <small class="form-text text-muted">input name..</small>
                </div>
                <div class="form-group">
                    <label >Customers</label>
                 <input type="text" class="form-control" name="restaurant_customers" class="form-control" value="{{old('restaurant_customers')}}">
                 <small class="form-text text-muted">input number of seats..</small>
                </div>
                <div class="form-group">
                    <label >Employees</label>
                   <input type="text" class="form-control" name="restaurant_employees" class="form-control" value="{{old('restaurant_employees')}}">
                   <small class="form-text text-muted">input number of workers..</small>
                </div>
                <div class="form-group">
                    <label >Dish of Day</label>
                    <select name="menu_id">
                        <option value="0" >Choose dish</option>
                        @foreach ($menus as $menu)
                        <option value="{{$menu->id}}">{{$menu->title}}</option>
                        @endforeach
                    </select>
                </div>
                
                <br>
                @csrf
               
                    <button type="submit" style="width: 100%">ADD</button>
                 </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
