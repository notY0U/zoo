<?php

namespace App\Http\Controllers;

use App\Specie;
use Illuminate\Http\Request;
use Validator;

class SpecieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $species = Specie::all();
       return view('specie.index', ['species' => $species]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('specie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'specie_name' => ['required', 'min:3', 'max:64'],
        ],
        [
            'specie_name.required'=> 'Species field cannot be empty',
            'specie_name.min'=> 'Species too short',
            'specie_name.max'=> 'Species too long'
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
 
        $specie = new Specie;
        $specie->name = $request->specie_name;
        $specie->save();
        return redirect()->route('specie.index')->with('success_message','Addition successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Specie  $specie
     * @return \Illuminate\Http\Response
     */
    public function show(Specie $specie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Specie  $specie
     * @return \Illuminate\Http\Response
     */
    public function edit(Specie $specie)
    {
        return view('specie.edit', ['specie' => $specie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Specie  $specie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specie $specie)
    {
        $validator = Validator::make($request->all(),
        [
            'specie_name' => ['required', 'min:3', 'max:64'],
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $specie->name = $request->specie_name;
        $specie->save();
        return redirect()->route('specie.index')->with('success_message','Update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Specie  $specie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specie $specie)
    {
        if($specie->specieManager->count()){
            return redirect()->route('specie.index')->with('info_message', 'Manager assigned, cannot delete');
        }
 
        $specie->delete();
       return redirect()->route('specie.index')->with('success_message','Removal successful');
    }
}
