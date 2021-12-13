<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    //


    public function addProducts(){
        
        $categories = Category::all();
        return view('admin.add-product', compact('categories'));
    }

    public function addProduct(Request $request){
        // $request->validate([
        //     'name' => 'string|max:255',
        //     'quantity' => 'integer',
        //     'price' => 'integer',
        //     'image' => 'string|max:255',
        // ]);

        if($request->hasFile('image')){
            $files = $request->file('image');

            $imageLocation= array();
            $i=0;
            foreach ($files as $file){
                $extension = $file->getClientOriginalExtension();
                $fileName= 'product_'. time() . ++$i . '.' . $extension;
                $location= '/images/products/';
                $file->move(public_path() . $location, $fileName);
                $imageLocation[]= $location. $fileName;
            }

            Product::insert([
                'name'=> $request->input('name'),
                'quantity'=> $request->input('quantity'),
                'price'=> $request->input('price'),
                'Details'=> $request->input('Details'),
                'category_id'=> $request->get('category_id'),
                'image'=> implode('|', $imageLocation),
                'created_at'=> now(),
            ]);
            
            return back()->with('success', 'Product Successfully Saved!');
        } else{
            return back()->with('error', 'Product was not saved Successfully!');
        }
 
    }
    public function allProducts(){
        $products = Product::all();
        //$product_cat_id = $products->category_id;
        $categories = Category::all();
        return view('admin.all-products', compact('products','categories'));
    }

    public function editProduct($id){
        $edit_products = Product::find($id);
        $categories = Category::all();
        return view('admin.edit-product', compact('edit_products', 'categories'));
    }


    public function updateProduct(Request $request, $id){

        $update_product = Product::find($id);
        
        if($request->hasFile('image')){
            $files = $request->file('image');
            
            $imageLocation= array();
            $i=0;
            foreach ($files as $file){
                $extension = $file->getClientOriginalExtension();
                $fileName= 'product_'. time() . ++$i . '.' . $extension;
                $location= '/images/products/';
                $file->move(public_path() . $location, $fileName);
                $imageLocation[]= $location. $fileName;
            
            }

            $new_image = implode('|', $imageLocation);
            
            //
        } else{
            $new_image = $update_product->image;
           // return back()->with('error', $update_product->name.' Product was not Update Successfully!');
        }

            $update_product->name= $request->input('name');
            $update_product->quantity= $request->input('quantity');
            $update_product->price= $request->input('price');
            $update_product->Details= $request->input('Details');
            $update_product->category_id= $request->get('category_id');
            $update_product->image=  $new_image;
           
            $update_product->save();
            return redirect('/admin/all-products')->with('success', $update_product->name.' Product Updated!');
            
        
    }


    public function deleteProduct($id){
        $delete = Product::find($id);
        $delete->delete();
        return back()->with('success',$delete->name.' Product Delete Success');
    }



        //Show All Data To the Web Site
        public function indexShow(){
            $products = Product::orderBy('created_at')->limit(5)->get();
            //$categories = Category::all();
            return view('welcome', compact('products'));
        }

        public function showWeb(){
            $products = Product::paginate(9);
            //$categories = Category::all();
            return view('products', compact('products'));
        }


        public function showSingle($id){
            $products = Product::find($id);
            $images = explode('|',$products->image);
            $releted_product = Product::where('category_id',$products->category_id)->where('id','!=',$products->id)->limit(4)->get();
            return view('single_product', compact('products','images', 'releted_product'));
        }



            // Cart Add Function

        public function addToCart(Request $request){
            $id= $request->has('pid')? $request->get('pid'): '';
            $name= $request->has('name')? $request->get('name'): '';
            $quantity= $request->has('quantity')? $request->get('quantity'): '';
            $price= $request->has('price')? $request->get('price'): '';

            $images= Product::find($id)->image;
            $image= explode('|', $images)[0];

            $cart= Cart::content()->where('id', $id)->first();
            $quntity = Product::find($id)->quantity;
            if($quantity > $quntity){
                return back()->with('error', 'Quantity Must be Less then '.$quntity);
            }else{

                if(isset($cart)&& $cart!=null){
                    $quantity= ((int)$quantity + (int)$cart->qty);
                    $total= ((int)$quantity * (int)$price);
                    Cart::update($cart->rowId, ['qty'=>$quantity, 'options'=> ['image'=>$image, 'total'=> $total]]);
                } else{
                    $total= ((int)$quantity * (int)$price);
                    Cart::add($id, $name, $quantity, $price, ['image'=>$image, 'total'=> $total]);
                }

                return back()->with('success', 'Product Added to Your Cart!');
            }
            
        }


        public function viewCart(){
            $carts= Cart::content();
            $subTotal= Cart::subtotal();
            $count = Cart::count();
    
            return view('cart', compact('carts', 'subTotal', 'count'));
        }

        public function removeItem($rowId){
            Cart::remove($rowId);
            return back()->with('success','Item Removed from Cart!');
        }

}
