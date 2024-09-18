<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use Illuminate\Http\Request;
use App\Functions\Helper;
use App\Http\Requests\BeerRequest;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beers = Beer::all();
        return view('beers.index', compact('beers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('beers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BeerRequest $request)
    {
        // $request->validate([
        //     'name' => 'required|min:3|max:100',
        //     'price' => 'required|min:0',
        //     'average' => 'required|numeric|min:0|max:5',
        //     'image' => 'required|max:255'
        // ],[
        //     'name.required' => 'Il nome è un campo obbligatorio',
        //     'name.min' => 'Il nome deve avere almeno :min caratteri',
        //     'name.max' => 'Il nome deve avere massimo :max caratteri',
        //     'price.required' => 'Il prezzo è un campo obbligatorio',
        //     'price.max' => 'Il prezzzo deve avere massimo :max caratteri',
        //     'average.required' => 'Il Voto è un campo obbligatorio',
        //     'average.numeric' => 'Il Voto deve essere numerico',
        //     'average.min' => 'Il Voto deve essere di almeno :min caratteri',
        //     'average.max' => 'Il Voto deve essere di massimo :max caratteri',
        //     'image.required' => 'L\'immagine è un campo obbligatorio',
        //     'image.max' => 'L\'immagine deve avere :max caratteri'
        // ]);

        $data = $request->all();

        $data['slug'] = Helper::generateSlug($data['name'], Beer::class);

        $new_beer = new Beer();

        // utilizziamo il fillable
        $new_beer->fill($data);

        $new_beer->save();

        return redirect()->route('beers.show', $new_beer);
    }

    /**
     * Display the specified resource.
     */
    public function show(Beer $beer)
    {
        return view('beers.show', compact('beer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beer $beer)
    {
        return view('beers.edit', compact('beer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BeerRequest $request, Beer $beer)
    {
        $data = $request->all();
        if($data['name'] != $beer->name){
            $data['slug'] = Helper::generateSlug($data['name'], Beer::class);
        }
        $beer->update($data);
        return redirect()->route('beers.show', $beer)->with('edit', 'Birra modificata con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beer $beer)
    {
        //
    }
}
