
 @extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">AUTHOR NAME</div>

               <div class="card-body">
                <form method="POST" action="{{route('menu.update',[$menu])}}" enctype="multipart/form-data">
               
                <div class="form-group">
                    <label>Dish</label>
                     <input type="text" class="form-control" name="menu_title" value="{{old('menu_title',$menu->title)}}">
                    <small class="form-text text-muted">input dish name..</small>
                </div>
                <div class="form-group">
                    <label>Price</label> 
                   <input type="text" class="form-control" name="menu_price" value="{{old('menu_price',$menu->price)}}">
                    <small class="form-text text-muted">input price..</small>
                </div>
                <div class="form-group">
                    <label>Weight</label> 
                     <input type="text" class="form-control" name="menu_weight" value="{{old('menu_weight',$menu->weight)}}">
                    <small class="form-text text-muted">input dish weight..</small>
                </div>
                <div class="form-group">
                    <label>Meat </label> 
                    <input type="text" class="form-control" name="menu_meat" value="{{old('menu_meat',$menu->meat)}}">
                    <small class="form-text text-muted">input how much..</small>
                </div>
               
                   <textarea name="menu_about" value="{{$menu->about}}" id="summernote">{!!$menu->about!!}</textarea>
                    @csrf
                    <hr>
                    <button type="submit"style="width: 100%" >EDIT</button>
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
