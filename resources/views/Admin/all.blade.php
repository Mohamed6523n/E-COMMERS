@extends('Admin.layout')

@section('body')

@include("success")


<table class="table">
    <thead>
      <tr>
        <th scope="col"> @</th>
        <th scope="col">Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Priec</th>
        <th scope="col">Image</th>
        <th scope="col">Aciton</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product )
      <tr>
          <th scope="row">{{$loop->iteration}}</th>
        <td>{{$product->name}}</td>
        <td>{{$product->quantity}}</td>
        <td>{{$product->priec}}</td>
        <td><img src="{{asset("storage/$product->image")}}" width="100px" alt="" srcset=""></td>
        <td>

            <h1>
                <a class="btn btn-success" href="{{url("products/show/$product->id")}}" >Show</a>
            </h1>

        </td>
    </tr>
    @endforeach

    </tbody>
  </table>


@endsection