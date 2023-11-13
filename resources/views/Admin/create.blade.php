@extends('Admin.layout')
@section('body')

@include("errors")
@include("success")

<form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">product Name</label>
      <input type="text" name="name" class="text-white form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">product desc</label>
        <textarea type="text" name="desc" class="text-white form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter desc"></textarea>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">product Price</label>
        <input type="number" name="priec" class="text-white form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">product quantity</label>
        <input type="text" name="quantity" class="text-white form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Category Name</label>
        <select name="category_id" id="">
            @foreach ( $category as $cate)
            <option value="{{$cate->id}}">{{$cate->name  }}</option>
            @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">product image</label>
        <input type="file" name="image" class="text-white form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection