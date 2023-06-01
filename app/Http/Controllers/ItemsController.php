<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('items.index', [
            'title' => 'Items',
            'items' => Items::latest()->simplePaginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create', [
            'title' => 'Create Items',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'category' => 'required',
            'link' => 'required | url',
            'name' => 'required | max:255',
            'content' => 'required',
            'image' => 'required | image ',
            'price' => 'required',
            'discount' => 'required',
        ]);

        //hitung harga setelah diskon
        $harga = $validate['price'] - ($validate['price'] * $validate['discount'] / 100);

        Items::create([
            'category_id' => $request->category,
            'link' => $request->link,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->content,
            'image' => $request->file('image')->store('items'),
            'price' => $harga,
            'discount' => $request->discount,
        ]);

        return redirect('/items')->with('success', 'Item has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function show(Items $items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function edit(Items $item)
    {
        return view('items.edit', [
            'title' => 'Edit Items',
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Items $item)
    {

        $validate = $request->validate([
            'category' => 'required',
            'link' => 'required | url',
            'name' => 'required | max:255',
            'content' => 'required',
            'image' => 'image',
            'price' => 'required',
        ]);

        //hitung harga setelah diskon
        $harga = $validate['price'] - ($validate['price'] * $request->price / 100);

        // upload image to storage/app/items
        if ($request->hasFile('image')) {
            $validate['image'] = $request->file('image')->store('items');
            Storage::delete($item->image);
        } else {
            $validate['image'] = $item->image;
        }

        Items::where('id', $item->id)
            ->update([
                'category_id' => $request->category,
                'link' => $request->link,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->content,
                'image' => $validate['image'], // store image to storage/app/items
                'price' => $harga,
                'discount' => $request->discount,
            ]);

        return redirect('/items')->with('success', 'Item has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy(Items $item)
    {
        if ($item->image) {
            Storage::delete($item->image);
        }
        Items::destroy($item->id);
        return redirect('/items')->with('success', 'Item has been deleted!');
    }
}
