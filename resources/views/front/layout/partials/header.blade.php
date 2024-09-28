<header id="main-header" class="header">

    <div id="top-header">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-4">
                    <div class="top-header-left">
                        <ul>
                            <li><i class="fa fa-phone" aria-hidden="true"></i> <a href=""> +91 8777262693</a>
                            </li>
                            <li><i class="fa fa-envelope aria-hidden="true"></i> <a
                                    href="">subash.srdar@gmail.com</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="top-header-center">
                        <p class="mb-0">GST NO. : <span>19HJMPS7984B2ZA</span></p>
                    </div>

                </div>


                <div class="col-lg-4">
                    <div class="top-header-right">
                        <a href="" class="header-book-btn"><i class="fa fa-file-pdf-o aria-hidden="true"></i>
                            download catalogue</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div id="second-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-4">
                    <div class="logo">
                        <img src="{{asset('front/images/logo.png')}}" class="img-fluid">
                    </div>
                </div>


                <!-- Section: Navbar Menu -->
                <div class="col-lg-7">
                    <div class="overlay"></div>
                    <nav class="menu">
                        <div class="menu-mobile-header">
                            <button type="button" class="menu-mobile-arrow"><i
                                    class="ion ion-ios-arrow-back"></i></button>
                            <div class="menu-mobile-title"></div>
                            <button type="button" class="menu-mobile-close"><i
                                    class="ion ion-ios-close"></i></button>
                        </div>
                        <ul class="menu-section">
                            <li><a href="{{route('front.home')}}">Home</a></li>
                            <li><a href="{{route('front.about-us')}}">About Us</a></li>
                            <li><a href="{{route('products.ourAllProducts')}}">Product</a></li>
                            <li><a href="{{route('front.contact-us')}}">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="header-item-right">
                    <button type="button" class="menu-mobile-trigger">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>