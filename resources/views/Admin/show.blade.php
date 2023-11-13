@extends('Admin.layout')
@section('body')

@include("success")




<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset("storage/$product->image") }}" class="w-100" alt="">
        </div>
        <div class="col-md-6">
            <h2>Product name : {{$product->name }}</h2>
            <p> <i>Product Desc</i>  :  {{$product->desc }}</p>
            <h4 >Product Priec :<b class="text-success">   {{$product->priec }} $</b></h4>
            <h4>Product Quantity: {{$product->quantity }}</h4>

            <h1>
                <a class="btn btn-success" href="{{url("products/edit/$product->id")}}" >edit</a>
            </h1>

            <form action="{{url("products/$product->id")}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">delete</button>
            </form>
        </div>

    </div>
</div>




@endsection