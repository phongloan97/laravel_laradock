<?php

namespace App\Http\Controllers;
use App\Product_model;
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
        $products = Product_model::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $product = new Product_model();

        $product->name = $request->input('name');
        $product->detail = $request->input('detail');

      //  $product->save();
        //return response()->json($product);
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
        $request->validate{[
            'name'=>'required',
            'detail'=>'required'
        ]};
        Product_model::create($request->all());
        return redirect()->route('products.index')->with('success','Product Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product =Product_model::find($id);
       // return response()->json($products);
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product =  Product_model::find($id);
        return view('products.edit',compact('product'));
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
        $products = Product_model::find($id);
        $products->name = $request->input('name');
        $products->detail = $request->input('detail');

        $products ->save();
    //  return response()->json($products);
        Product_model::find($id)->update($request->all());
        return redirect()->route('products.index')->with('success','Product update successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product_model::find($id)->delete();
        return redirect()->route('products.index')->with('success','Products delete successfully');
    }
}
