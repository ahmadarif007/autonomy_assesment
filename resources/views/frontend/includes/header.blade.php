<div class="header-top">
    <div class="header-left">
        <div class="header-dropdown">
            <a href="#">Usd</a>
            <div class="header-menu">
                <ul>
                    <li><a href="#">Eur</a></li>
                    <li><a href="#">Usd</a></li>
                </ul>
            </div><!-- End .header-menu -->
        </div><!-- End .header-dropdown -->

        <div class="header-dropdown">
            <a href="#">Eng</a>
            <div class="header-menu">
                <ul>
                    <li><a href="#">English</a></li>
                    <li><a href="#">French</a></li>
                    <li><a href="#">Spanish</a></li>
                </ul>
            </div><!-- End .header-menu -->
        </div><!-- End .header-dropdown -->
    </div><!-- End .header-left -->

    <div class="header-right">
        <ul class="top-menu">
            <li>
                <a href="#">Links</a>
                <ul>
                    <li><a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Login</a></li>
                </ul>
            </li>
        </ul><!-- End .top-menu -->
    </div><!-- End .header-right -->
</div><!-- End .header-top -->

<div class="header-middle sticky-header">
    <div class="header-left">
        <button class="mobile-menu-toggler">
            <span class="sr-only">Toggle mobile menu</span>
            <i class="icon-bars"></i>
        </button>

        <a href="index.html" class="logo">
            <img src="{{asset('assets')}}/images/demos/demo-24/logo.png" alt="Molla Logo" width="110" height="25">
        </a>
    </div><!-- End .header-left -->

    <div class="header-center">
        <nav class="main-nav">
            <ul class="menu sf-arrows">
                <li class="megamenu-container active">
                    <a href="index.html" class="sf-with-ul">Home</a>
                </li>
                <li>
                    <a href="#" class="sf-with-ul">Category</a>
                    <ul>
                        @php 
							$category=DB::table('categories')->orderBy('category_name','ASC')->get();
						@endphp
						@foreach($category as $row)
                        @php
                            $subcategory=DB::table('subcategories')->where('category_id',$row->id)->get();
                        @endphp
                        <li>
                            <a href="{{ route('categorywise.product',$row->id) }}" class="sf-with-ul">{{ $row->category_name }}</a>
                            <ul>
                                @foreach($subcategory as $row)
                                @php
                                    $childcategory=DB::table('childcategories')->where('subcategory_id',$row->id)->get();
                                @endphp
                                <li>
                                    <a href="{{ route('subcategorywise.product',$row->id) }}">{{ $row->subcategory_name }}</a>
                                    <ul>
                                        @foreach($childcategory as $row)
                                        <li><a href="{{ route('childcategorywise.product',$row->id) }}">{{ $row->childcategory_name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="category.html" class="sf-with-ul">Shop</a>
                </li>
                <li>
                    <a href="{{ route('all.products') }}" class="sf-with-ul">Product</a>
                </li>
                <li>
                    <a href="#" class="sf-with-ul">Pages</a>
                </li>
                <li>
                    <a href="blog.html" class="sf-with-ul">Blog</a>
                </li>
                <li>
                    <a href="elements-list.html" class="sf-with-ul">Elements</a>
                </li>
                
            </ul><!-- End .menu -->
        </nav><!-- End .main-nav -->
    </div>

    <div class="header-right">
        <div class="header-search">
            <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
            <form action="#" method="get">
                <div class="header-search-wrapper">
                    <label for="q" class="sr-only">Search</label>
                    <input type="search" class="form-control" name="q" id="q" placeholder="Search in..." required>
                </div><!-- End .header-search-wrapper -->
            </form>
        </div><!-- End .header-search -->
        <div class="wishlist">
            <a href="wishlist.html" title="Wishlist">
                <i class="icon-heart-o"></i>
                <span class="wishlist-count">3</span>
            </a>
        </div><!-- End .compare-dropdown -->

        <div class="dropdown cart-dropdown">
            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                <i class="icon-shopping-cart"></i>
                <span class="cart-count">2</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-cart-products">
                    <div class="product">
                        <div class="product-cart-details">
                            <h4 class="product-title">
                                <a href="product.html">Beige knitted elastic runner shoes</a>
                            </h4>

                            <span class="cart-product-info">
                                <span class="cart-product-qty">1</span>
                                x $84.00
                            </span>
                        </div><!-- End .product-cart-details -->

                        <figure class="product-image-container">
                            <a href="product.html" class="product-image">
                                <img src="{{asset('assets')}}/images/products/cart/product-1.jpg" alt="product">
                            </a>
                        </figure>
                        <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                    </div><!-- End .product -->

                    <div class="product">
                        <div class="product-cart-details">
                            <h4 class="product-title">
                                <a href="product.html">Blue utility pinafore denim dress</a>
                            </h4>

                            <span class="cart-product-info">
                                <span class="cart-product-qty">1</span>
                                x $76.00
                            </span>
                        </div><!-- End .product-cart-details -->

                        <figure class="product-image-container">
                            <a href="product.html" class="product-image">
                                <img src="{{asset('assets')}}/images/products/cart/product-2.jpg" alt="product">
                            </a>
                        </figure>
                        <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                    </div><!-- End .product -->
                </div><!-- End .cart-product -->

                <div class="dropdown-cart-total">
                    <span>Total</span>

                    <span class="cart-total-price">$160.00</span>
                </div><!-- End .dropdown-cart-total -->

                <div class="dropdown-cart-action">
                    <a href="cart.html" class="btn btn-primary">View Cart</a>
                    <a href="checkout.html" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                </div><!-- End .dropdown-cart-total -->
            </div><!-- End .dropdown-menu -->
        </div><!-- End .cart-dropdown -->
    </div><!-- End .header-right -->
</div><!-- End .header-middle -->
