<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Image;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    //__all products__//
    public function index()
    {
        $product=DB::table('products')
                    ->leftJoin('categories','products.category_id','categories.id')
                    ->leftJoin('subcategories','products.subcategory_id','subcategories.id')
                    ->leftJoin('childcategories','products.subcategory_id','childcategories.id')
                    ->select('products.*','categories.category_name','subcategories.subcategory_name','childcategories.childcategory_name')
                    ->get();
        return response()->json($product);
    }

    //__store product__//
    public function store(Request $request)
    {
        $product = $request->all();
        $validator = Validator::make($product, [
            'name' => 'required',
            'code' => 'required|unique:products|max:55',
            'subcategory_id' => 'required',
            'unit' => 'required',
            'selling_price' => 'required',
            'color' => 'required',
            'description' => 'required',
        ]);

        $product = Product::create([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'childcategory_id' => $request->childcategory_id,
            'name' => $request->name,
            'slug' => $request->slug,
            'code' => $request->code,
            'color' => $request->color,
            'size' => $request->size,
            'purchase_price' => $request->purchase_price,
            'selling_price' => $request->selling_price,
            'stock_quantity' => $request->stock_quantity,
            'description' => $request->description,
            'thumbnail' => $request->thumbnail,
            'status' => $request->status,
        ]);

        return response()->json([
            'success' => true, 
            'message' => 'Product create successfully',
            'product' => $product,
        ]);
    }

    //__product show__//
    public function show($id){
        $product = Product::findorfail($id);
        return response()->json($product);
    }
    
    //__update product__//
    public function update(Request $request, $id)
    {
        $product = $request->all();
        $validator = Validator::make($product, [
            'name' => 'required',
            'code' => 'required|unique:products|max:55',
            'subcategory_id' => 'required',
            'unit' => 'required',
            'selling_price' => 'required',
            'color' => 'required',
            'description' => 'required',
        ]);

        $product = Product::findorfail($id);
        $product->update([$request->all()]);
        return response()->json(['message' => 'Product records updated succesfully'], 200);
    }

    //__product delete__//
    public function destroy($id)
    {
        $Product = Product::find($id);
        $Product->delete();
        return response()->json(['message' => 'Product records deleted succesfully'], 200);
    }

}
