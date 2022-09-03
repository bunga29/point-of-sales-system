<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request,[
    		'code'  => ['required', 'unique:products'],
    		'name' => 'required',
            'category_id' => 'required',
            'qty' => 'required',
            'restock_qty' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
    	]);

        // dd($validator);
        Product::create([
            'code'          => $request->code,
            'name'          => $request->name,   
            'category_id'   => $request->category_id,
            'qty'           => $request->qty,
            'restock_qty'   => $request->restock_qty,
            'buying_price'  => $request->buying_price,
            'selling_price' => $request->selling_price,
            'status'        => $request->status ? true : false,
            'created_by'    => Auth::user()->name,
            'updated_by'    => Auth::user()->name,
    	]);
        
        return redirect()->back()->with('successMsg', $request->name .' berhasil ditambahkan');
        // return route('product.create')->with('successMsg', $request->name .' berhasil ditambahkan');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::whereId($id)->with('category')->first()->toArray();
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showImport()
    {
        return view('product.import');
    }

    public function importTemplate()
    {
        $myFile = storage_path("template/product_import.xlsx");
        // dd($myFile);
    	return response()->download($myFile);
    }


    public function import(Request $request)
    {
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $file->move('DataProduk', $fileName);
        Excel::import(new ProductImport, public_path('/DataProduk/'.$fileName));
        return redirect()->back()->with('successMsg','Proses Import sedang berjalan');

    }
}
