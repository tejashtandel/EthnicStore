<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>My E-commerce Website</title>
    <link rel="shortcut icon" href="{{asset('admin/images/icon/.png')}}" />


    <!-- Fontfaces CSS-->
    <link href="{{asset('admin/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('admin/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('admin/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/wow/animate.css" rel="stylesheet')}}" media="all">
    <link href="{{asset('admin/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/css/test.css')}}" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="{{asset('admin/css/theme.css')}}" rel="stylesheet" media="all">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index">
                            <img src="{{asset('admin/images/icon/image2.png')}}" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">

                            </ul>
                        </li>
                        <li>
                            <a href="category">
                                <i class="fas fa-chart-bar"></i>Category</a>
                        </li>
                        <li>
                            <a href="subcategory">
                                <i class="fas fa-chart-bar"></i>Sub Category</a>
                        </li>
                        <li>
                            <a href="products">
                                <i class="fas fa-table"></i>Products</a>
                        </li>
                        <li>
                            <a href="cart">
                                <i class="far fa-check-square"></i>Cart</a>
                        </li>
                        <li>
                            <a href="order">
                                <i class="fas fa-calendar-alt"></i>Order</a>
                        </li>
                        <li>
                            <a href="payment">
                                <i class="fas fa-map-marker-alt"></i>payment</a>
                        </li>
                        <li>
                            <a href="headers">
                                <i class="fas fa-map-marker-alt"></i>Headers</a>
                        </li>


                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{asset('admin/images/icon/image5.png')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="index">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">

                            </ul>
                        </li>
                        <!-- <li>
                            <a href="report">
                            <i class="fa fa-file" aria-hidden="true"></i>Reports</a>
                        </li> -->

                        <li>
                            <a href="{{route('users.index') }}">
                                <i class="fa fa-user" aria-hidden="true"></i>Users</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">

                                <i class="fa fa-list-alt"></i>Product
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="ui-basic">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="{{route('stocks.index') }}"><i class="fa fa-circle" aria-hidden="true" style="font-size:7px"></i>Stocks</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="{{route('category.index') }}"><i class="fa fa-circle" aria-hidden="true" style="font-size:7px"></i>Category</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="{{route('subcategory.index') }}"><i class="fa fa-circle" aria-hidden="true" style="font-size:7px"></i>SubCategory</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="{{route('products.index') }}"><i class="fa fa-circle" aria-hidden="true" style="font-size:7px"></i>Products</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="{{route('product_detail.index') }}"><i class="fa fa-circle" aria-hidden="true" style="font-size:7px"></i>Product Details</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- <li>
                            <a href="stocks">
                                <i class="fa fa-user" aria-hidden="true"></i>Stocks</a>
                        </li>
                        <li>
                            <a href="category">
                                <i class="fa fa-list-alt" aria-hidden="true"></i>Category</a>
                        </li>
                        <li>
                            <a href="subcategory">
                                <i class="fas fa-list-alt"></i>Sub Category</a>
                        </li>
                        <li>
                            <a href="products">
                                <i class="fas fa-plus"></i>Products</a>
                        </li>
                        <li>
                            <a href="product_detail">
                                <i class="fa-brands fa-product-hunt"></i>Products Details</a>
                        </li> -->
                        <!-- <li>
                            <a href="brand">
                                <i class="fas fa-table"></i>Brands</a>
                        </li> -->
                        <!-- <li>
                            <a href="cart">
                                <i class="far fa-check-square"></i>Cart</a>
                        </li>
                        <li>
                            <a href="order">
                                <i class="fas fa-calendar-alt"></i>Order</a>
                        </li>
                        <li>
                            <a href="payment">
                                <i class="fas fa-map-marker-alt"></i>payment</a>
                        </li> -->
                        <!-- <li>
                            <a href="banners">
                                <i class="fas fa-image"></i>Banners</a>
                        </li>
                        <li>
                            <a href="footers">
                                <i class="fa fa-copyright"></i>Footer</a>
                        </li>
                        <li>
                            <a href="header">
                                <i class="fa fa-header" aria-hidden="true"></i>headers</a>
                        </li>
                        <li>
                            <a href="abouts">
                                <i class="fa fa-info"></i>About Us</a>
                        </li> -->




                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Design</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                {{-- <li>
                                    <a href="{{route('brand.index') }}"><i class="fa fa-circle" aria-hidden="true" style="font-size:7px"></i>Brands</a>
                                </li> --}}
                                <li>
                                    <a href="{{route('banners.index') }}"><i class="fa fa-circle" aria-hidden="true" style="font-size:7px"></i>Banners</a>
                                </li>
                                {{-- <li>
                                    <a href="{{route('footers.index') }}"><i class="fa fa-circle" aria-hidden="true" style="font-size:7px"></i>Footer</a>
                                </li>
                                <li>
                                    <a href="{{route('header.index') }}"><i class="fa fa-circle" aria-hidden="true" style="font-size:7px"></i>Header</a>
                                </li> --}}
                                <li>
                                    <a href="{{route('abouts.index') }}"><i class="fa fa-circle" aria-hidden="true" style="font-size:7px"></i>About Us</a>
                                </li>
                            </ul>
                        </li>

<!-- 
                        <li>
                            <a href="feedback">
                                <i class="fa fa-comments" aria-hidden="true"></i>Feedback</a>
                        </li>
 -->




                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-file"></i>Reports</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{route('userreport.index') }}"><i class="fa fa-circle" aria-hidden="true" style="font-size:7px"></i>Users Reports</a>
                                </li>
                                <li>
                                <a href="{{route('feedback.index') }}"><i class="fa fa-circle" aria-hidden="true" style="font-size:7px"></i>Feedback Reports</a>
                                </li>

                                <li>
                                    <a href="{{route('proreport.index') }}"><i class="fa fa-circle" aria-hidden="true" style="font-size:7px"></i>Products Reports</a>
                                </li>
                                <li>
                                    <a href="{{route('orderreport.index') }}"><i class="fa fa-circle" aria-hidden="true" style="font-size:7px"></i>Orders Reports</a>
                                </li>
                            </ul>
                        </li>




                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                             <i class="fas fa-copy"></i>Pages</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li> -->
                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul> -->
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <!-- <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." /> -->
                                <!-- <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button> -->
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <!-- <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span> -->
                                        <div class="mess-dropdown js-dropdown">
                                            <!-- <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div> -->
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="{{asset('admin/images/icon/avatar-06.jpg')}}" alt="Michelle Moreno" />
                                                </div>
                                                <!-- <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div> -->
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="{{asset('admin/images/icon/avatar-04.jpg')}}" alt="Diane Myers" />
                                                </div>
                                                <!-- <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div> -->
                                            </div>
                                            <!-- <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div> -->
                                        </div>
                                    </div>
                                    <!-- <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="{{asset('admin/images/icon/avatar-06.jpg')}}" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="{{asset('admin/images/icon/avatar-05.jpg')}}" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                     <img src="{{asset('admin/images/icon/avatar-04.jpg')}}" alt="Cynthia Harvey" /> 
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                    <div class="account-wrap">
                                        <div class="account-item clearfix js-item-menu">
                                            <div class="image">
                                                <img src="{{asset('admin/images/icon/image4.png')}}" alt="John Doe" />
                                            </div>
                                            <div class="content">
                                                <a class="js-acc-btn" href="#">Admin</a>
                                            </div>
                                            <div class="account-dropdown js-dropdown">
                                                <div class="info clearfix">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="{{asset('admin/images/icon/image4.png')}}" alt="John Doe" />
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <h5 class="name">
                                                            <a href="#">Admin</a>
                                                        </h5>
                                                        <span class="email">admin@gmail.com</span>
                                                    </div>
                                                </div>

                                                <div class="account-dropdown__footer">
                                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                        Logout
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->