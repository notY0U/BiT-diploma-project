

 @extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">CREATE NEW DISH</div>

               <div class="card-body">
                <form method="POST" action="{{route('menu.store')}}" enctype="multipart/form-data">
                    <div class="form-group">
                   <label>Dish</label>  
                    <input type="text" name="menu_title" class="form-control "value="{{old('menu_title')}}"> 
                    <small class="form-text text-muted">input dish name..</small>
                </div>
                <div class="form-group">
                    <label>Price</label> 
                    <input type="text" name="menu_price" class="form-control" value="{{old('menu_meat')}}">
                    <small class="form-text text-muted">input price..</small>
                </div>
                <div class="form-group">
                    <label>Weight</label> 
                    <input type="text" name="menu_weight" class="form-control" value="{{old('menu_weight')}}">
                    <small class="form-text text-muted">input dish weight..</small>
                </div>
                <div class="form-group">
                    <label>Meat </label> 
                    <input type="text" name="menu_meat" class="form-control" value="{{old('menu_meat')}}">
                    <small class="form-text text-muted">input amount..</small>
                </div>
                
                    <textarea name="menu_about" id="summernote"></textarea>
                    <hr>
                    @csrf
                    <button type="submit" style="width: 100%">ADD</button>
                 </form>
               </div>
           </div>
       </div>
   </div>
</div>
<script>
    $(document).ready(function() {
       $('#summernote').summernote();
     });
    </script>
@endsection
