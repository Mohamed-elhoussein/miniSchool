<?php
namespace App\Trait;

use App\Models\image;
use App\Models\Product;

trait UpdateProduct
{
    public static function UpdateIfNotFoundImage($request,$id){
        
            $product=$request->except("_token","_method","img");
            Product::where("id",$id)->update($product);
    
    }
    public static function UpdateFoundImage($request,$id){
        self::UpdateIfNotFoundImage($request,$id);
        $img=image::where("product_id",$id)->get('img');
        image::DeleteImage($img);
        image::where("product_id",$id)->delete();
        image::CreateImage($id , $request->img);

    }
}