<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\datacvs;
use Illuminate\Http\Request;

// use GuzzleHttp\Psr7\Request;

class CVController extends Controller
{
    /**
     * Display a listing of the resource.
     */
                            // public function index() : View
                            // {
                            //     $CV = datacvs::latest()->paginate(3);
                            //     return view('admin.index', compact('CV'));
                            //     // return view('index', [
                            //     //     'products' => Product::latest()->paginate(3)
                            //     // ]);
                            // }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        datacvs::create($request->all());
        return redirect()->route('dashboard')
                ->withSuccess('CV berhasil di tambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id) : View
    {
        $product = datacvs::find($id);
        return view('admin.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id) : View
    {
        $product = datacvs::find($id);
        return view('admin.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id) : RedirectResponse
    {
        $product = datacvs::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('dashboard')
                ->withSuccess('CV berhasil di update.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id) : RedirectResponse
    {
        $product = datacvs::find($id); 
        $product->delete();
        return redirect()->route('dashboard')
                ->withSuccess('CV berhasil di hapu.');
    }
}