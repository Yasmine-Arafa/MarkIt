<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show','search','cat']]);
    }


    public function index()
    {
        $products = Product::paginate(30);

        
        return view('products',['products'=>$products]);

        //return view('dashboard.index')-> with ('products', $products);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function search(Request $request)
    {
        $search=$request->get('search');
        $products=Product::where('name','like','%'.$search.'%')->paginate();

        if($products[0] == NULL)
           {        
            return view('products')
            ->with('mssg','No Products Found')
            ->with('products',$products) ;
           }
        else    
          {   
              return view('products')->with('products',$products);
          }

    }

    public function cat( $cat)
    {

       $products=Product::where('cat','=',$cat)->paginate(30);
       return view('products')->with('products',$products);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required',
            'about'=>'required',
            'price'=>'required|',
            'product_image'=>'image|nullable|max:50000'
            ]);
            if($request->hasFile('product_image')){

                $filenameWithExt=$request->file('product_image')->getClientOriginalName();
                $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension=$request->file('product_image')->getClientOriginalExtension();
                $fileNameToStore=$filename.'_'.time().'.'.$extension;
                $path=$request->file('product_image')->storeAs('public/product_images',$fileNameToStore);
            }else{
                $fileNameToStore='noimage.jpg';
            }
            $product= new Product;
            $product->name=$request->input('name');
            $product->about=$request->input('about');
            // $product->category_id=$request->input('category_id');
            $product->user_id=auth()->user()->id;
            $product->product_image=$fileNameToStore;

            $product->save();
            return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product= Product::find($id);


        if($product == NULL)
           {        
            return view('product_details')
            ->with('mssg','No Product Found')
            ->with('product',$product) ;
           }
        else    
          {   
            return view('product_details')->with('product',$product);
        }



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product= Product::find($id);

        if(auth()->user()->id !==$product->user_id){
            return redirect('/products')->with('error','UnAuth',);
        }
        return view('product_edit',['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=> 'required',
            'about'=>'required',
            'price'=>'required|',
            'product_image'=>'image|nullable|max:50000'
            ]);
            if($request->hasFile('product_image')){

                $filenameWithExt=$request->file('product_image')->getClientOriginalName();
                $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension=$request->file('product_image')->getClientOriginalExtension();
                $fileNameToStore=$filename.'_'.time().'.'.$extension;
                $path=$request->file('product_image')->storeAs('public/product_images',$fileNameToStore);
            }
            $product= product::find($id);
            $product->name=$request->input('name');
            $product->about=$request->input('about');
            // $product->category_id=$request->input('category_id');
            if($request->hasFile('product_image')){
                if ($product->product_image != 'noimage.jpg') {
                  //  Storage::delete('public/product_images/'.$product->product_image);
                }
                $product->product_image=$fileNameToStore;
            }
            $product->save();
            return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product= Product::find($id);

        if(auth()->user()->id !==$product->user_id){
            return redirect('/')->with('error','UnAuth');

        }
        if ($product->cover_image != 'noimage.jpg') {
          //  Storage::delete('public/product_images/'.$product->product_image);
        }

        $product->delete();
        return redirect('/');
    }


    public function filter(Request $request)
    {
        
    }
}
