<nav class="flex-row p-0 navbar fixed-top d-flex">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('Admin/assets')}}/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="flex-grow navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="mt-2 nav-link mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul>

            <ul class="navbar-nav text-center navbar-nav-right">

                <li class="nav-item dropdown d-none d-lg-block">
                    <a class="nav-link btn btn-outline-success create-new-button"
                     href="change/en"> English </a>

                </li>
                <li class="nav-item dropdown d-none d-lg-block">
                    <a class="nav-link btn  btn-outline-success create-new-button"
                     href="change/ar"> العربية </a>

                </li>

                <li class="nav-item dropdown d-none d-lg-block">
                    <a class="nav-link btn btn-success create-new-button"
                    href="{{ url('products/create') }}">+ Create New Product</a>

                </li>

                <li class="nav-item dropdown d-none d-lg-block">
                    <a class="nav-link btn btn-success create-new-button"
                    href="{{ url('dashboard') }}"> Admin profile</a>

                </li>


            </ul>

            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>