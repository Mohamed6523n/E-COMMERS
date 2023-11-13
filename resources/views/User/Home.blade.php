@extends('User.layout')

@section('products')


<div class="row">

    <div class="col-md-12">
        <form action="{{url('search')}}" method="get">
            @csrf
            <input type="text" class="form-control" name="key" id=""  value="{{ old('key') }}">
            <button type="submit" class="btn btn-info mt-2">search</button>
        </form>
@include("success")
    </div>

@foreach ($products as $product)
        <div class="col-md-4">
                <div class="product-item">
                        <a href=""><img src={{asset("storage/$product->image")}} alt=""></a>

                        <div class="down-content">
                            <a href={{ url("product/$product->id") }}><h4>{{ $product->name }}</h4></a>
                            <h5>Priec :  ${{ $product->priec }}</h5>

                        </div>
                        <form action="{{ url("addToCart/$product->id") }}" method="post">

                            @csrf
                            <input type="number" name="qut" id="">
                            <button type="submit" class="btn btn-outline-success">Add To Cart</button>
                        </form>
                </div>
        </div>
        @endforeach
</div>

@endsection
