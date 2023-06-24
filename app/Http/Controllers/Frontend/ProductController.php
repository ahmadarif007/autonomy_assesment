<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class ProductController extends Controller
{
    public function productDetails(){
        return view('frontend.product.productDetailsContent');
    }

    public function allProducts()
    {
        $allProducts=Product::paginate(12);
        return view('frontend.product.allProducts', compact('allProducts'));
    }

    public function product_details($slug)
    {
        $product=Product::where('slug',$slug)->first();
        $related_product=DB::table('products')->where('subcategory_id',$product->subcategory_id)->orderBy('id','DESC')->take(10)->get();

            // // Share button 1
            // $shareButtons1 = \Share::page(
            //     url()->current()
            // )
            // ->facebook()
            // ->twitter()
            // ->linkedin()
            // ->telegram()
            // ->whatsapp() 
            // ->reddit();

            // // Share button 2
            // $shareButtons2 = \Share::page(
            //     url()->current()
            // )
            // ->facebook()
            // ->twitter()
            // ->linkedin()
            // ->telegram();

            // // Share button 3
            // $shareButtons3 = \Share::page(
            //     url()->current()
            // )
            // ->facebook()
            // ->twitter()
            // ->linkedin()
            // ->telegram()
            // ->whatsapp() 
            // ->reddit();
        return view('frontend.product.productDetailsContent', compact('product','related_product'));
            // ->with('shareButtons1',$shareButtons1 )
            // ->with('shareButtons2',$shareButtons2 )
            // ->with('shareButtons3',$shareButtons3 );
    }

    //product quick view
    public function ProductQuickView($id)
    {
        $product=Product::where('id',$id)->first();
        return view('frontend.product.quick_view',compact('product'));
    }

    //categorywise product page
    public function categoryWiseProduct($id)
    {
        $category=DB::table('categories')->where('id',$id)->first();
        $subcategory=DB::table('subcategories')->where('category_id',$id)->get();
        $products=DB::table('products')->where('category_id',$id)->paginate(10);
        return view('frontend.product.category_products',compact('subcategory','products','category'));

    }

    //subcategorywise product
    public function SubcategoryWiseProduct($id)
    {
        $subcategory=DB::table('subcategories')->where('id',$id)->first();
        $childcategories=DB::table('childcategories')->where('subcategory_id',$id)->get();
        $products=DB::table('products')->where('subcategory_id',$id)->paginate(10);
        return view('frontend.product.subcategory_product',compact('childcategories','products','subcategory'));
    }

    //childcategory product
    public function ChildcategoryWiseProduct($id)
    {
        $childcategory=DB::table('childcategories')->where('id',$id)->first();
        $categories=DB::table('categories')->get();
        $products=DB::table('products')->where('childcategory_id',$id)->paginate(10);
        return view('frontend.product.childcategory_product',compact('categories','products','childcategory'));
    }

    public function search_products(Request $request)
    {
        $all_products = Product::whereBetween('selling_price',[$request->left_value, $request->right_value])->get();
        return view('frontend.product.allProducts',compact('all_products'))->render();
    }

    public function sort_by(Request $request)
    {
        if($request->sort_by == 'lowest_price'){
            $all_products = Product::orderBy('price','asc')->get();
        }
        if($request->sort_by == 'highest_price'){
            $all_products = Product::orderBy('price','desc')->get();
        }
        return view('search_result',compact('all_products'))->render();

    }
}
