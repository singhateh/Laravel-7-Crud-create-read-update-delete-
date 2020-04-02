<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Products = Product::paginate(4);

        return view('Products.index', compact('Products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $file = $request->file('product_image');
        // dd($file); die;
        $request->validate([
            'product_title'=> 'required|max:255',
            'product_name'=> 'required|max:255',
            'product_code'=> 'required|max:25',
            'product_price'=> 'required|max:255',
            // 'product_description'=> 'required|max:255',
            // 'product_image'=> 'required'
        ]);

            $file = $request->file('product_image');

                if($file)
                {
                    
                    $extension = $file->getClientOriginalExtension();

                    $product_image = time().'.' .$extension;

                    $file -> move('laravel7/Product/' , $product_image);


                    $product = new Product([
                    'product_title' => $request->get('product_title'),
                    'product_name' => $request->get('product_name'),
                    'product_code' => $request->get('product_code'),
                    'product_price' => $request->get('product_price'),
                    'product_description' => $request->get('product_description'),
                    'product_image' => $product_image,
                ]);

                 $product->save();

                 if($product){
                    return redirect('/products')->with('success', 'Congrats Product Saved Successfully!');
                 }
            }

                 return redirect('/products')->with('error', 'Opps! Product Fail to Create!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Product = Product::find($id);

        return view('Products.show', compact('Product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Product = Product::find($id);

        return view('Products.edit', compact('Product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_title'=> 'required|max:255',
            'product_name'=> 'required|max:255',
            'product_code'=> 'required|max:25',
            'product_price'=> 'required|max:255',
            // 'product_description'=> 'required|max:255',
            // 'product_image'=> 'required'
        ]);

        $input = $request->all();
        $file = $request->file('product_image');
        // dd($input); die;

                if($file)
                {
                    
                    $extension = $file->getClientOriginalExtension();

                    $product_image = time().'.' .$extension;

                    $file -> move('laravel7/Product/' , $product_image);

                    $Product = array(
                        'product_title' => $request->product_title,
                        'product_name' => $request->product_name,
                        'product_code' => $request->product_code,
                        'product_price' => $request->product_price,
                        'product_description' => $request->product_description,
                        'product_image' => $product_image
                    );

                        
                    Product::findOrfail($id)->update($Product);

                    // $Product = Product::find($id);
                    // // dd($Product); die;
                    // $Product->product_title = $request->get('product_title');
                    // $Product->product_name = $request->get('product_name');
                    // $Product->product_code = $request->get('product_code');
                    // $Product->product_price = $request->get('product_price');
                    // $Product->product_description = $request->get('product_description');
                    // $Product->product_image = $product_image;
                    // $Product->update();
                }

                    return redirect('/products')->with('success', 'Congrats Product Updated Successfully!');
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Product = Product::find($id);
        $Product->delete();

        return redirect('/products')->with('success', 'Congrats Product Deleted Successfully!');
    }
}
