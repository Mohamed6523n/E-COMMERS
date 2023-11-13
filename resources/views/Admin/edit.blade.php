@extends('Admin.layout')
@section('body')

@include("errors")


<form method="POST" action="{{url("products/$product->id")}}" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="form-group">
      <label for="exampleInputEmail1">product Name</label>
      <input type="text" value="{{ $product->name }}" name="name" class="text-white form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">product desc</label>
        <textarea type="text" name="desc" class="text-white form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter desc">{{ $product->desc }}</textarea>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">product Price</label>
        <input type="number" value="{{ $product->priec }}" name="priec" class="text-white form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">product quantity</label>
        <input type="text" value="{{ $product->quantity }}" name="quantity" class="text-white form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
      </div>

      {{--  <div class="form-group">
        <label for="exampleInputEmail1">Category Name</label>
        <select name="category_id" id="">
            <option value="{{$category->id}}">{{$category->name  }}</option>
        </select>
      </div>  --}}

      <div class="form-group">
        <label for="exampleInputEmail1">product image</label>
        <input type="file" name="image" class="text-white form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <img src="{{asset("storage/$product->image")}}" width="100px" alt="" srcset="">

    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>



@endsection