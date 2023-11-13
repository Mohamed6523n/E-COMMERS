<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
  <body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('redirect') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('dashboard') }}">dashboard</a>
              </li>



            </ul>

          </div>
        </div>
    </nav>

      <div class="container p-5  mt-5">

          <div class="row">

                  <div class="col-md-6">
                      <img src="{{ asset("storage/$product->image") }}" class="w-100" alt="">
                  </div>

                  <div class="col-md-6">
                      <h2>Product name : {{$product->name }}</h2>
                      <p> <i>Product Desc</i>  :  {{$product->desc }}</p>
                      <h4 >Product Priec :<b class="text-success">   {{$product->priec }} $</b></h4>
                      <h4>Product Quantity: {{$product->quantity }}</h4>

                    <form  action="{{ url('addToCart/$product->id') }}" method="post">
                        <input class="form-control mt-3" type="number" name="qut" id="">
                        <button type="submit" class=" mt-3 form-control btn btn-outline-success">Add To Cart</button>
                    </form>
                  </div>
          </div>


      </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>