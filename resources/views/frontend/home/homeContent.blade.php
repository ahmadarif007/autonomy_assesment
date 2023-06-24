@extends('frontend.frontMaster')
@section('title')
home
@endsection
@section('mainContent')

<main class="main">

    <section class="best-sellers">
        <div class="container">
            <div class="heading">
                <p class="heading-cat">favourite from every category</p>
                <h3 class="heading-title">Best Sellers</h3>
            </div>
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow text-center" data-toggle="owl" 
            data-owl-options='{
                "nav": true, 
                "dots": false,
                "margin": 30,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":2
                    },
                    "768": {
                        "items":3
                    },
                    "992": {
                        "items":3
                    },
                    "1200": {
                        "items":4
                    }
                }
            }'>

            @php 
                $products=DB::table('products')->limit(4)->get();
                // dd($products);
            @endphp
            @foreach($products as $row) 
                <div class="product product-10 text-center">
                    <figure class="product-media">
                        <a href={{ url("/product-details")}}>
                            <img src="{{ asset('files/'.$row->thumbnail) }}" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-quickview" title="Quick view">
                                <span>{{ $row->name }}</span>
                            </a>
                        </div><!-- End .product-action-vertical -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">

                        <div class="product-action">
                            <a href="#" class="btn-cart"><span>add to cart</span></a>
                            <a href="#" class="btn-product-icon btn-wishlist"><span>Add to Wishlist</span></a>
                        </div><!-- End .product-action -->
                        <div class="product-intro">
                            <h3 class="product-title">
                                <a href="{{ route('product.details',$row->slug) }}">{{ $row->name }}</a>
                            </h3><!-- End .product-title -->
                            <div class="product-price">
                                ${{ $row->selling_price }}
                            </div><!-- End .product-price -->
                        </div>
                        <div class="product-detail">
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( 6 Reviews )</span>
                            </div><!-- End .rating-container -->
                            
                        </div>
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            @endforeach

            </div>
        </div>
    </section>

    <section class="featured-products">
        <div class="container">
            <div class="heading">
                <p class="heading-cat">Featured Products </p>
                <h3 class="heading-title">Featured Products</h3>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-7 products">
                    <div class="col-6">
                        <div class="product product-10 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-24/featured-products/product-1-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-24/featured-products/product-1-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">

                                <div class="product-action">
                                    <a href="#" class="btn-cart"><span>add to cart</span></a>
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>Add to Wishlist</span></a>
                                </div><!-- End .product-action -->
                                <div class="product-intro">
                                    <h3 class="product-title">
                                        <a href="product.html">UA Spawn Low</a>
                                    </h3><!-- End .product-title -->
                                    <div class="product-price">
                                        $77.99
                                    </div><!-- End .product-price -->
                                </div>
                                <div class="product-detail">
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 3 Reviews )</span>
                                    </div><!-- End .rating-container -->
                                    <div class="product-nav product-nav-dots">
                                        <a href="#" class="active" style="background: #34529d;"><span class="sr-only">Color name</span></a>
                                        <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                    </div><!-- End .product-nav -->
                                </div>
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div>
                    <div class="col-6">
                        <div class="product product-10 text-center">
                            <figure class="product-media">
                                <span class="product-label label-sale">sale</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-24/featured-products/product-2-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-24/featured-products/product-2-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">

                                <div class="product-action">
                                    <a href="#" class="btn-cart"><span>add to cart</span></a>
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>Add to Wishlist</span></a>
                                </div><!-- End .product-action -->
                                <div class="product-intro">
                                    <h3 class="product-title">
                                        <a href="product.html">The North Face Fanorak 2.0</a>
                                    </h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <span class="new-price">$76.99</span>
                                        <span class="old-price">Was $109.99</span>
                                    </div><!-- End .product-price -->
                                </div>
                                <div class="product-detail">
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 1 Reviews )</span>
                                    </div><!-- End .rating-container -->
                                    <div class="product-nav product-nav-dots" style="visibility: hidden;">
                                        <a href="#" class="active" style="background: #34529d;"><span class="sr-only">Color name</span></a>
                                        <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                    </div><!-- End .product-nav -->
                                </div>
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div>
                    <div class="col-6">
                        <div class="product product-10 text-center">
                            <figure class="product-media">
                                <span class="product-label label-sale">sale</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-24/featured-products/product-3-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-24/featured-products/product-3-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">

                                <div class="product-action">
                                    <a href="#" class="btn-cart"><span>add to cart</span></a>
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>Add to Wishlist</span></a>
                                </div><!-- End .product-action -->
                                <div class="product-intro">
                                    <h3 class="product-title">
                                        <a href="product.html">Osprey Talia</a>
                                    </h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <span class="new-price">$67.50</span>
                                        <span class="old-price">Was $150.00</span>
                                    </div><!-- End .product-price -->
                                </div>
                                <div class="product-detail">
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 6 Reviews )</span>
                                    </div><!-- End .rating-container -->
                                    <div class="product-nav product-nav-dots" style="visibility: hidden;">
                                        <a href="#" class="active" style="background: #34529d;"><span class="sr-only">Color name</span></a>
                                        <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                    </div><!-- End .product-nav -->
                                </div>
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div>
                    <div class="col-6">
                        <div class="product product-10 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-24/featured-products/product-4-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-24/featured-products/product-4-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">

                                <div class="product-action">
                                    <a href="#" class="btn-cart"><span>add to cart</span></a>
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>Add to Wishlist</span></a>
                                </div><!-- End .product-action -->
                                <div class="product-intro">
                                    <h3 class="product-title">
                                        <a href="product.html">Ignite Limitless Leather</a>
                                    </h3><!-- End .product-title -->
                                    <div class="product-price">
                                        $52.66
                                    </div><!-- End .product-price -->
                                </div>
                                <div class="product-detail">
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 6 Reviews )</span>
                                    </div><!-- End .rating-container -->
                                    <div class="product-nav product-nav-dots" style="visibility: hidden;">
                                        <a href="#" class="active" style="background: #34529d;"><span class="sr-only">Color name</span></a>
                                        <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                    </div><!-- End .product-nav -->
                                </div>
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-8 col-12">
                    <div class="product product-10 product-lg text-center">
                        <figure class="product-media">
                            <span class="product-label label-deal">deal of the day</span>
                            <a href="product.html">
                                <img src="assets/images/demos/demo-24/featured-products/product-5.jpg" alt="Product image" class="product-image">
                            </a>

                            <div class="product-action-vertical">
                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            </div><!-- End .product-action-vertical -->
                        </figure><!-- End .product-media -->
                        <div class="deal">
                            <div class="deal-countdown offer-countdown" data-until="+11d"></div><!-- End .deal-countdown -->
                        </div>
                        
                        <div class="product-body">

                            <div class="product-intro">
                                <h3 class="product-title">
                                    <a href="product.html">Troy Lee Designs A1 MIPS Bike Helmet</a>
                                </h3><!-- End .product-title -->
                                <div class="product-price">
                                    $139.00
                                </div><!-- End .product-price -->
                            </div>
                            <div class="product-detail">
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 3 Reviews )</span>
                                </div><!-- End .rating-container -->
                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #666666;"><span class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #cc6666;"><span class="sr-only">Color name</span></a>
                                </div><!-- End .product-nav -->
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-cart"><span>add to cart</span></a>
                                <a href="#" class="btn-product-icon btn-wishlist"><span>Add to Wishlist</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div>
            </div>
        </div>
    </section>

    <section class="subscribe">
        <div class="container">
            <div class="heading">
                <p class="heading-cat">Get The Latest News & Deals</p>
                <h3 class="heading-title">Stay In The Know</h3>
            </div>
            <div class="col-lg-6 subscribe-form">
                <form action="#">
                    <div class="input-group">
                        <input type="email" placeholder="Enter your Email Address" aria-label="Email Adress" required="">
                        <div class="input-group-append">
                            <button class="btn btn-subscribe" type="submit"><span>Subscribe</span></button>
                        </div><!-- .End .input-group-append -->
                    </div><!-- .End .input-group -->
                </form>
            </div>
        </div>
    </section>

    <section class="instagram mb-3">
        <div class="container">
            <div class="heading">
                <p class="heading-cat">Follow Us On Instagram <span class="highlight">@Ahmad Arif<span></p>
            </div>
            <div class="row">
                <div class="col-xl-5col col-md-3 col-6 instagram-feed">
                    <img src="assets/images/demos/demo-24/instagram/back-1.jpg">
                    <div class="instagram-feed-content">
                        <a href="#"><i class="icon-heart-o"></i>280</a>
                        <a href="#"><i class="icon-comments"></i>22</a>
                    </div>
                </div>
                <div class="col-xl-5col col-md-3 col-6 instagram-feed">
                    <img src="assets/images/demos/demo-24/instagram/back-2.jpg">
                    <div class="instagram-feed-content">
                        <a href="#"><i class="icon-heart-o"></i>280</a>
                        <a href="#"><i class="icon-comments"></i>22</a>
                    </div>
                </div>
                <div class="col-xl-5col col-md-3 col-6 instagram-feed">
                    <img src="assets/images/demos/demo-24/instagram/back-3.jpg">
                    <div class="instagram-feed-content">
                        <a href="#"><i class="icon-heart-o"></i>280</a>
                        <a href="#"><i class="icon-comments"></i>22</a>
                    </div>
                </div>
                <div class="col-xl-5col col-md-3 col-6 instagram-feed">
                    <img src="assets/images/demos/demo-24/instagram/back-4.jpg">
                    <div class="instagram-feed-content">
                        <a href="#"><i class="icon-heart-o"></i>280</a>
                        <a href="#"><i class="icon-comments"></i>22</a>
                    </div>
                </div>
                <div class="col-xl-5col col-md-3 col-6 instagram-feed">
                    <img src="assets/images/demos/demo-24/instagram/back-5.jpg">
                    <div class="instagram-feed-content">
                        <a href="#"><i class="icon-heart-o"></i>280</a>
                        <a href="#"><i class="icon-comments"></i>22</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection