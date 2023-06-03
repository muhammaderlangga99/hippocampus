<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Categori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categori.index', [
            'title' => 'Categori',
            'categories' => Categori::oldest()->paginate(8),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|min:3|max:255',
            'image' => 'required | image'
        ]);

        Categori::create([
            'name' => $validate['name'],
            'slug' => Str::slug($validate['name']),
            'image' => $request->file('image')->store('categori'),
        ]);

        return redirect('/categori')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categori  $categori
     * @return \Illuminate\Http\Response
     */
    public function show(Categori $categori)
    {
        $categories = $categori->items();
        if (request('category')) {
            $categories->where('name', 'like', '%' . request('category') . '%')
                ->orWhere('price', 'like', '%' . request('category') . '%')
                ->orWhere('discount', 'like', '%' . request('category') . '%');
        }

        return view('categori.show', [
            'title' => $categori,
            'items' => $categories->paginate(8)->withQueryString(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categori  $categori
     * @return \Illuminate\Http\Response
     */
    public function edit(Categori $categori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categori  $categori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categori $categori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categori  $categori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categori $categori)
    {
        if ($categori->image) {
            Storage::delete($categori->image);
        }
        // ubah category_id pada tabel items menjadi null
        Items::where('categori_id', $categori->id)->update(['categori_id' => 1]);
        Categori::destroy($categori->id);
        return redirect('/categori')->with('success', 'Data berhasil dihapus!');
    }
}
