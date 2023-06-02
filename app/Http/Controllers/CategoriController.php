<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Categori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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
        ]);

        Categori::create([
            'name' => $validate['name'],
            'slug' => Str::slug($validate['name']),
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
        return view('categori.show', [
            'title' => $categori->name,
            'items' => $categori->items()->paginate(8),
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
        // ubah category_id pada tabel items menjadi null
        Items::where('categori_id', $categori->id)->update(['categori_id' => 1]);
        Categori::destroy($categori->id);
        return redirect('/categori')->with('success', 'Data berhasil dihapus!');
    }
}
