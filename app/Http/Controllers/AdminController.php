<?php

namespace App\Http\Controllers;

use App\Models\Creation;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }


    public function show()
    {
        return view('admin.show', [
            'products' => Product::all()
        ]);
    }
    
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'Name' => 'required|min:3',
            'Description' => 'required|min:10',
            'Price' => 'required|min:100|max:3000|numeric',
            'cover' => 'nullable|image|max:2048',
            'is_creation' => 'nullable|numeric|between:0,1'
        ]);

        if ($request->hasFile('cover')) {
            $validated['cover'] = '/storage/'.$request->file('cover')->store('/covers');
           
        }

        $product = Product::create(collect($validated)->all());

        return redirect()->route('home');
    }



    public function edit(Product $product)
    {
        return view('admin.edit', [
            'product' => $product,
        ]);
    }


    public function update(Product $product, Request $request)
    {

        $validated = $request->validate([
            'Name' => 'required|min:3',
            'Description' => 'required|min:10',
            'Price' => 'required|min:100|max:3000|numeric',
            'cover' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            if ($product->cover) {
                Storage::delete(str($product->cover)->remove('/storage/'));
            }
            $validated['cover'] = '/storage/'.$request->file('cover')->store('covers');
        }

        $product->update(collect($validated)->all());

        return redirect()->route('admin.show');
    }

    public function destroy(Product $product)
    {
        Storage::delete(Str($product->cover)->remove('/storage/'));
        $product->delete();

        return redirect()->route('admin.show');
    }  


    public function creationshow()
    {
        return view('admin.creationshow', [
            'creations' => Creation::all()
        ]);
    }



    public function creationcreate()
    {
        return view('admin.creationcreate');
    }

    public function creationstore(Request $request)
    {

        $validated = $request->validate([
            'Name' => 'required|min:3',
            'Description' => 'required|min:10',
            'Price' => 'required|min:100|max:3000|numeric',
            'cover' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            $validated['cover'] = '/storage/'.$request->file('cover')->store('covers');
        }

        $product = Creation::create(collect($validated)->all());

        return redirect()->route('home');
    }


    public function creationedit(Creation $creation)
    {
        return view('admin.creationedit', [
            'creation' => $creation,
        ]);
    }


    public function creationupdate(Creation $creation, Request $request)
    {

        $validated = $request->validate([
            'Name' => 'required|min:3',
            'Description' => 'required|min:10',
            'Price' => 'required|min:100|max:3000|numeric',
            'cover' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            if ($creation->cover) {
                Storage::delete(str($creation->cover)->remove('/storage/'));
            }
            $validated['cover'] = '/storage/'.$request->file('cover')->store('covers');
        }

        $creation->update(collect($validated)->all());

        return redirect()->route('admin.creationshow');
    }

    public function creationdestroy(Creation $creation)
    {
        Storage::delete(Str($creation->cover)->remove('/storage/'));
        $creation->delete();

        return redirect()->route('admin.creationshow');
    }    
    
}
