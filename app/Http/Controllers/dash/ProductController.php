<?php

namespace App\Http\Controllers\dash;

use App\Models\image;
use App\Models\Product;
use App\Trait\UpdateProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    use UpdateProduct;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::with("images")->get();
          return view('DashProduct.view',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('DashProduct.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( ProductRequest $request)
    {
       $product=$request->except("_token","img");
    $img=$request->only("img");
    try{
      DB::beginTransaction();
      $dataPro=Product::create($product);
      image::CreateImage($dataPro->id , $img);
      DB::commit();
      return to_route('product.index');
    }catch(Expection $e){
        DB::rollback();
        return $e->getMessage();

    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $product= Product::findOrfail($id);
      return view('DashProduct.edit',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
          // return $request;
        if(empty($request->img)){
        UpdateProduct::UpdateIfNotFoundImage($request,$id);
       return to_route('product.index');
        }else{
          UpdateProduct::UpdateFoundImage($request,$id); 
            return to_route('product.index'); 
        }
     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $img=image::where("product_id",$id)->get('img');
        image::DeleteImage($img);
        Product::findOrfail($id)->delete();
        return to_route('product.index');
    }
}
