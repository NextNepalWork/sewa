<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ShopCollection;
use App\Models\Product;
use App\Models\Shop;
use App\Recommend;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        return new ShopCollection(Shop::all());
    }
    public function recommendations(){
        
        $recommended = [];
        if(Auth::check()){
            $recommended = Recommend::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
            
            // $data = [];
            // foreach($recommended as $a => $b){
            //     $z = [
            //         'id' => $b->id,
            //         'name' => $b->name,
            //         'delivery_charge' => $b->delivery_charge
            //     ];
            //     array_push($data,$z);
            // }
            
            return new ProductCollection($recommended->paginate(10));
            // return response()->json([
            //     'success' => true,
            //     'message' => 'Locations Retrieve Successfully',
            //     'data'=> $data,
            // ]); 
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Login Error',
                'data'=> [],
            ]); 
        }
    }
    public function info($id)
    {
        return new ShopCollection(Shop::where('id', $id)->get());
    }

    public function shopOfUser($id)
    {
        return new ShopCollection(Shop::where('user_id', $id)->get());
    }

    public function allProducts($id)
    {
        $shop = Shop::findOrFail($id);
        return new ProductCollection(Product::where('user_id', $shop->user_id)->latest()->paginate(10));
    }

    public function topSellingProducts($id)
    {
        $shop = Shop::findOrFail($id);
        return new ProductCollection(Product::where('user_id', $shop->user_id)->orderBy('num_of_sale', 'desc')->limit(4)->get());
    }

    public function featuredProducts($id)
    {
        $shop = Shop::findOrFail($id);
        return new ProductCollection(Product::where(['user_id' => $shop->user_id, 'featured'  => 1])->latest()->get());
    }

    public function newProducts($id)
    {
        $shop = Shop::findOrFail($id);
        return new ProductCollection(Product::where('user_id', $shop->user_id)->orderBy('created_at', 'desc')->limit(10)->get());
    }

    public function brands($id)
    {

    }
}
