@extends('frontend.frontMaster')
@section('title')
category-product
@endsection

@section('mainContent')

<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Product Category<span>Elements</span></h1>
        </div>
    </div>
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="elements-list.html">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="container">
            <h2 class="title text-center mb-3">Categorywise product</h2>
            <div class="owl-carousel owl-simple" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":4,
                            "nav": true,
                            "dots": false
                        }
                    }
                }'>
                @foreach($products as $row)
                <div class="banner banner-cat">
                    <a href="#">
                        <img src="{{ asset('files/'.$row->thumbnail) }}" alt="Banner">
                    </a>
                    <div class="banner-content banner-content-static text-center">
                        <h3 class="banner-title">
                            <a href="{{ route('product.details',$row->slug) }}">{{ $row->name }}</a>
                        </h3>
                        <h4 class="banner-subtitle">{{ $row->selling_price }}</h4>
                        <a href="#" class="banner-link">Shop Now</a>
                    </div>
                </div>
                @endforeach
            </div>
            <hr class="mb-4">
        </div>
    </div>
    <div class="container mb-5">
        <div class="row elements">
            <div class="col-xl-5col col-lg-4 col-md-3 col-6">
                <a href="elements-accordions.html" class="element-type">
                    <div class="element">
                        <i class="element-img"></i>
                        <i class="element-hover-img"></i>
                        <p>accordions</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-5col col-lg-4 col-md-3 col-6">
                <a href="elements-banners.html" class="element-type">
                    <div class="element">
                        <i class="element-img"></i>
                        <i class="element-hover-img"></i>
                        <p>banners</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-5col col-lg-4 col-md-3 col-6">
                <a href="elements-blog-posts.html" class="element-type">
                    <div class="element">
                        <i class="element-img"></i>
                        <i class="element-hover-img"></i>
                        <p>blog posts</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-5col col-lg-4 col-md-3 col-6">
                <a href="elements-buttons.html" class="element-type">
                    <div class="element">
                        <i class="element-img"></i>
                        <i class="element-hover-img"></i>
                        <p>buttons</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-5col col-lg-4 col-md-3 col-6">
                <a href="elements-cta.html" class="element-type">
                    <div class="element">
                        <i class="element-img"></i>
                        <i class="element-hover-img"></i>
                        <p>call to action</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-5col col-lg-4 col-md-3 col-6">
                <a href="elements-icon-boxes.html" class="element-type">
                    <div class="element">
                        <i class="element-img"></i>
                        <i class="element-hover-img"></i>
                        <p>icon boxes</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-5col col-lg-4 col-md-3 col-6">
                <a href="elements-portfolio.html" class="element-type">
                    <div class="element">
                        <i class="element-img"></i>
                        <i class="element-hover-img"></i>
                        <p>portfolio</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-5col col-lg-4 col-md-3 col-6">
                <a href="elements-product-category.html" class="element-type">
                    <div class="element">
                        <i class="element-img"></i>
                        <i class="element-hover-img"></i>
                        <p>product catigories</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-5col col-lg-4 col-md-3 col-6">
                <a href="elements-products.html" class="element-type">
                    <div class="element">
                        <i class="element-img"></i>
                        <i class="element-hover-img"></i>
                        <p>products</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-5col col-lg-4 col-md-3 col-6">
                <a href="elements-tabs.html" class="element-type">
                    <div class="element">
                        <i class="element-img"></i>
                        <i class="element-hover-img"></i>
                        <p>tabs</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-5col col-lg-4 col-md-3 col-6">
                <a href="elements-testimonials.html" class="element-type">
                    <div class="element">
                        <i class="element-img"></i>
                        <i class="element-hover-img"></i>
                        <p>testimonials</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-5col col-lg-4 col-md-3 col-6">
                <a href="elements-titles.html" class="element-type">
                    <div class="element">
                        <i class="element-img"></i>
                        <i class="element-hover-img"></i>
                        <p>titles</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-5col col-lg-4 col-md-3 col-6">
                <a href="elements-typography.html" class="element-type">
                    <div class="element">
                        <i class="element-img"></i>
                        <i class="element-hover-img"></i>
                        <p>typography</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-5col col-lg-4 col-md-3 col-6">
                <a href="elements-video-banners.html" class="element-type">
                    <div class="element">
                        <i class="element-img"></i>
                        <i class="element-hover-img"></i>
                        <p>video</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</main>

@endsection