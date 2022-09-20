<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Product;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class DetailsProductComponent extends Component
{
    public $slug_property;
    public $user_name;
    public $comments;
    public function mount($slug)
    {
        $this->slug_property = $slug;
        if(Auth::check())
        {
            $this->user_name = Auth::user()->name;
        }
        
    }
    public function  store($product_id,$product_name,$product_price){
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_massage','Item added succesfully');
        return redirect()->route('product.cart');
    }
    public function resetInput()
    {
        $this->comments = null;
        
    }
    public function postComment()
    {
        if(Auth::check())
        {
            $comments = new Comment();
        $comments->username = $this->user_name;
        $comments->product_slug = $this->slug_property;
        $comments->comment = $this->comments;
        $comments->save();
        $this->resetInput();
            
        }
        else{
            return redirect()->route('login');
        }
        
                
    }
    public function deleteComment($id)
    {
        $commentDEl = Comment::find($id);
        $commentDEl->delete();
    }
    public function render()
    {
        $details_product = Product::where('slug',$this->slug_property)->first();
        $similer_product = Product::where('category_id',$details_product->category_id)->inRandomOrder()->limit(8)->get();
        $allComment = Comment::where('product_slug',$this->slug_property)->get();
        return view('livewire.details-product-component',['detailsProduct'=>$details_product,'similer_product'=>$similer_product,'allcomment' => $allComment])->layout('layouts.base');
    }
}
