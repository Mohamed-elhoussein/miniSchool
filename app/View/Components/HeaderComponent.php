<?php

namespace App\View\Components;

use Closure;
use App\Models\Cart;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class HeaderComponent extends Component
{
   public $itemCart;
   
   
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $id_login=Auth::user()->id??"";
       $data=Cart::where("user_id",$id_login)->with("products.images")->get();
       $this->itemCart=$data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header-component');
    }
}
