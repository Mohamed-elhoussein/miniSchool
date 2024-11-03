<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class image extends Model
{
    use HasFactory;
    protected $fillable=["product_id","img"];
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public static function CreateImage( $product_id ,$img){
        $img=$img["img"]??$img;
        foreach ($img as $file){
            $newName=md5(uniqid()).".".$file->extension();
            image::create([
             "product_id"=>$product_id,
             "img"=>$newName 
            ]);
            $file->storeAs("public/images/".$newName);
        }

    }
    public static function DeleteImage($img){
        $img=$img["img"]??$img;
        foreach($img as $file){
            unlink(storage_path("app/public/images/".$file["img"]));
        }
     
    }
}
