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


class ProductController extends Controller
{
    public function index()
    {
        $product=DB::table('products')
                    ->leftJoin('categories','products.category_id','categories.id')
                    ->leftJoin('subcategories','products.subcategory_id','subcategories.id')
                    ->leftJoin('childcategories','products.subcategory_id','childcategories.id')
                    ->select('products.*','categories.category_name','subcategories.subcategory_name','childcategories.childcategory_name');
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
           'name' => 'required',
           'code' => 'required|unique:products|max:55',
           'subcategory_id' => 'required',
           'unit' => 'required',
           'selling_price' => 'required',
           'color' => 'required',
           'description' => 'required',
        ]);

       //subcategory call for category id
       $subcategory=DB::table('subcategories')->where('id',$request->subcategory_id)->first();
       $slug=Str::slug($request->name, '-');

       $data=array();
       $data['name']=$request->name;
       $data['slug']=Str::slug($request->name, '-');
       $data['code']=$request->code;
       $data['category_id']=$subcategory->category_id;
       $data['subcategory_id']=$request->subcategory_id;
       $data['childcategory_id']=$request->childcategory_id;
       $data['purchase_price']=$request->purchase_price;
       $data['selling_price']=$request->selling_price;
       $data['stock_quantity']=$request->stock_quantity;
       $data['color']=$request->color;
       $data['size']=$request->size;
       $data['unit']=$request->unit;
       $data['description']=$request->description;
       $data['status']=$request->status;

       $product = DB::table('products')->insert($data);
       return response()->json([
            'success' => true, 
            'message' => 'Product create successfully',
            'product' => $product,
        ]);
    }

    
    //__update product__//
    public function update(Request $request)
    {
        $validated = $request->validate([
           'name' => 'required',
           'code' => 'required|max:55',
           'subcategory_id' => 'required',
           'selling_price' => 'required',
           'color' => 'required',
           'unit' => 'required',
           'description' => 'required',
       ]);

        $subcategory=DB::table('subcategories')->where('id',$request->subcategory_id)->first();
        $slug=Str::slug($request->name, '-');

        $data=array();
        $data['name']=$request->name;
        $data['slug']=Str::slug($request->name, '-');
        $data['code']=$request->code;
        $data['category_id']=$subcategory->category_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['childcategory_id']=$request->childcategory_id;
        $data['purchase_price']=$request->purchase_price;
        $data['selling_price']=$request->selling_price;
        $data['stock_quantity']=$request->stock_quantity;
        $data['color']=$request->color;
        $data['size']=$request->size;
        $data['unit']=$request->unit;
        $data['description']=$request->description;
        $data['status']=$request->status;

        DB::table('products')->where('id',$request->id)->update($data);
        return response()->json(['message' => 'Product records updated succesfully'], 200);
    }

    //product delete
    public function destroy($id)
    {
        if(Product::where('id', $id)->exists()){
            $Product = Product::find($id);
            $Product->delete();
            return response()->json(['message' => 'Product records deleted succesfully'], 200);
        }else{
            return response()->json(['message' => 'Product records not found'], 404);
        }
    }

}
