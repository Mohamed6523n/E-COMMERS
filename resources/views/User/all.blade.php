@extends('User.layout')


@section('products')


@foreach ($products as $product)
<div class="col-md-4">
    <div class="product-item">
        <a href=""><img src={{asset("storage/$product->image")}} alt=""></a>
        <div class="down-content">
            <a href="#"><h4>{{ $product->name }}</h4></a>
            <h6>${{ $product->priec }}</h6>
            <h5>Avialable Amounte : <b> {{ $product->quantity }}</b></h5>
            <p>{{ $product->desc }}</p>
            <ul class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
            </ul>
            <span>Reviews (24)</span>
        </div>

      
    </div>
</div>
@endforeach

@endsection
{{--  "{{asset('assets')}}/images/product_01.jpg"  --}}









{{--
    @section('allProducts')







    @endsection  --}}