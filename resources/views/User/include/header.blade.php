<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Ethhnic Fashion Wear</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('User/images/logo2.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="User/images/apple-touch-icon.png">
    <!--My Custom Css-->



    <link rel="stylesheet" href="User/css/custommy.css">
    <link rel="stylesheet" href="{{ asset('User/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('User/css/baguetteBox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('User/css/bootsnav.css') }}">
    <link rel="stylesheet" href="{{ asset('User/css/carousel-ticker.css') }}">
    <link rel="stylesheet" href="{{ asset('User/css/code_animate.css') }}">
    <link rel="stylesheet" href="{{ asset('User/css/jquery-ui.css') }}">



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('User/css/bootstrap.min.css') }}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('User/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('User/css/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('User/css/custom.css') }}">
    <!--- For Login Modal--->
    <link rel="stylesheet" href="{{ asset('User/css/login.css') }}">
    <!-- For Slider-->
    <link rel="stylesheet" href="{{ asset('User/css/superslides.css') }}">
    <!----My customes for Pages--->




    <link rel="stylesheet" href="{{ asset('User/css/newtry.css') }}" !important />

    <link rel="stylesheet" href="{{ asset('User/css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('User/css/addcart.css') }}">
    <link rel="stylesheet" href="{{ asset('User/css/billing.css') }}">
    <link rel="stylesheet" href="{{ asset('User/css/tnc.css') }}">



    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css"
        integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="http://code.jquery.com/jquery-1.6.2.min.js"></script>

</head>

<body>

    <!-- Start Main Top -->
    {{-- <div class="main-top">
        <div class="container-fluid">
            <div class="row">
               
                <div class="our-link">
                     <ul>            
                      <li><a href="contactus">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <div class="top-search">
            <div class="container">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu"
                        aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand"><img src="{{ asset('User/images/logo2.png') }}" class="newlogo"
                            alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        {{-- @foreach ($header as $head) --}}

                        <li class="nav-item "><a class="nav-link" href="{{ route('home.index') }}">Home</a>
                        </li>

                        {{-- @endforeach --}}

                        <li class="nav-item"><a class="nav-link" href="{{ route('top.index') }}">Top
                                Wear</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('ethic.index') }}">Ethic
                                Set</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('bottom.index') }}">Bottom
                                Wear</a></li>

                        <li class="nav-item"><a class="nav-link" href="about">About Us</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{ route('contact.index') }}">Contact Us</a></li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" data-target="#login" href="{{ route('login') }}">Login</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a id="navbar" class="nav-link dropdown-toggle" href="{{route('userdetails.show', Auth::user()->id)}}" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('cart.index') }}">
                                    <i class="fa fa-shopping-bag"></i>

                                </a></li>


                            <div class="" aria-labelledby="">


                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                            {{-- </li> --}}
                        @endguest


                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        {{-- <li class="search"><a href="#"><i class="fa fa-search"></i></a></li> --}}

                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            {{-- <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                            <a href="#" class="photo"><img src="User/images/img-pro-01.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Delica omtantur </a></h6>
                            <p>1x - <span class="price">$80.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="User/images/img-pro-02.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Omnes ocurreret</a></h6>
                            <p>1x - <span class="price">$60.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="User/images/img-pro-03.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Agam facilisis</a></h6>
                            <p>1x - <span class="price">$40.00</span></p>
                        </li>
                        <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: $180.00</span>
                        </li>
                    </ul>
                </li>
            </div> --}}
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
