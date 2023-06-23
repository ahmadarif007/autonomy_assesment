<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Str;
use Image;
use DataTables;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use File;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //index method
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $imgurl='files';

            $product="";
              $query=DB::table('products')->leftJoin('categories','products.category_id','categories.id')
                    ->leftJoin('subcategories','products.subcategory_id','subcategories.id');

                if ($request->category_id) {
                    $query->where('products.category_id',$request->category_id);
                 }

                if ($request->status==1) {
                    $query->where('products.status',1);
                }
                if ($request->status==0) {
                    $query->where('products.status',0);
                }

            $product=$query->select('products.*','categories.category_name','subcategories.subcategory_name')
                    ->get();
            return DataTables::of($product)
                    ->addIndexColumn()
                    ->editColumn('thumbnail',function($row) use ($imgurl){
                        return '<img src="'.$imgurl.'/'.$row->thumbnail.'"  height="30" width="30" >';
                    })
                    ->editColumn('status',function($row){
                        if ($row->status==1) {
                            return '<a href="#" data-id="'.$row->id.'" class="deactive_status"><i class="fas fa-thumbs-down text-danger"></i> <span class="badge badge-success">active</span> </a>';
                        }else{
                            return '<a href="#" data-id="'.$row->id.'" class="active_status"><i class="fas fa-thumbs-up text-danger"></i> <span class="badge badge-danger">deactive</span> </a>';
                        }
                    })
                    ->addColumn('action', function($row){
                        $actionbtn='
                        <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="'.route('product.edit',[$row->id]).'" class="btn btn-info btn-sm edit"><i class="fas fa-edit"></i></a> 
                        <a href="'.route('product.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i>
                        </a>';
                       return $actionbtn;   
                    })
                    ->rawColumns(['action','category_name','subcategory_name','thumbnail','status'])
                    ->make(true);       
        }

        $category=DB::table('categories')->get();
        return view('backend.product.index',compact('category' ));
    }

    //product create page
    public function create()
    {
        $category=DB::table('categories')->get();  // Category::all();
        return view('backend.product.create',compact('category'));
    }

    //product store method
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

       //single thumbnail
       if ($request->thumbnail) {
             $thumbnail=$request->thumbnail;
             $photoname=$slug.'.'.$thumbnail->getClientOriginalExtension();
             Image::make($thumbnail)->resize(600,600)->save('files/'.$photoname);
             $data['thumbnail']=$photoname;   // files/product/plus-point.jpg
       }

       DB::table('products')->insert($data);
       $notification=array('messege' => 'Product Inserted!', 'alert-type' => 'success');
       return redirect()->back()->with($notification);

    }

    //edit method
    public function edit($id)
    {
        $product=DB::table('products')->where('id',$id)->first();
        //$product=Product::findorfail($id);
        $category=Category::all();
         //childcategory get_
        $childcategory=DB::table('childcategories')->where('category_id',$product->category_id)->get();
        // dd($childcategory);
        return view('backend.product.edit',compact('product','category','childcategory'));
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

       //__old thumbnail ase kina__ jodi thake new thumbnail insert korte hobe
       $thumbnail = $request->file('thumbnail');
        if($thumbnail) {
           
             $thumbnail=$request->thumbnail;
             $photoname=$slug.'.'.$thumbnail->getClientOriginalExtension();
             Image::make($thumbnail)->resize(600,600)->save('files/product/'.$photoname);
             $data['thumbnail']=$photoname;   // files/product/plus-point.jpg   
        }

       DB::table('products')->where('id',$request->id)->update($data);
       $notification=array('messege' => 'Product Updated!', 'alert-type' => 'success');
       return redirect()->route('product.index')->with($notification);
    }

    //product delete
    public function destroy($id)
    {

        $product=DB::table('products')->where('id',$id)->first();  //product data get
        if (File::exists('files/'.$product->thumbnail)) {
              FIle::delete('files/'.$product->thumbnail);
        }

        DB::table('products')->where('id',$id)->delete();
        $notification=array('messege' => 'Product Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //not status
    public function notstatus($id)
    {
        DB::table('products')->where('id',$id)->update(['status'=>0]);
        return response()->json('Product Deactive');
    }

    //active staus
    public function activestatus($id)
    {
        DB::table('products')->where('id',$id)->update(['status'=>1]);
        return response()->json('Product Activated');
    }
}
