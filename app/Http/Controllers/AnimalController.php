<?php

namespace App\Http\Controllers;

use Validator;
use App\Specie;
use App\Manager;
use App\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $animals = Animal::all();
        // dd($animals);
        return view('animal.index', ['animals' => $animals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $species = Specie::all();
        $managers = Manager::all();
        return view('animal.create', ['managers' => $managers], ['species' => $species]);
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
            'animal_yob' => ['required', 'min:4', 'max:4'],
            'animal_name' => ['required', 'min:3', 'max:255']
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $manager=Manager::find(request()->manager_id);
        if ($manager->specie_id !== (int) $request->specie_id){
            return redirect()->route('animal.create')->with('info_message', 'Manager not qualified,
            please choose manager qualified for the species');
        }
        $animal = new Animal;
        $animal->name = $request->animal_name;
        $animal->specie_id = $request->specie_id;
        $animal->yob = $request->animal_yob;
        $animal->animal_book = $request->animal_animal_book;
        $animal->manager_id = $request->manager_id;
        
        $animal->save();
        return redirect()->route('animal.index')->with('success_message','Addition successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        $animals = Animal::all();
        $species = Specie::all();
        $managers = Manager::all();
        return view('animal.edit', ['animal' => $animal, 'managers' => $managers, 'species' => $species]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        $validator = Validator::make($request->all(),
        [
            'animal_yob' => ['required', 'min:4', 'max:4'],
            'animal_name' => ['required', 'min:3', 'max:255']
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $manager=Manager::find(request()->manager_id);
        if ($manager->specie_id !== (int) $request->specie_id){
            return redirect()->route('animal.create')->with('info_message', 'Manager not qualified,
            please choose manager qualified for the species');
        }
        $animal->name = $request->animal_name;
        $animal->specie_id = $request->specie_id;
        $animal->yob = $request->animal_yob;
        $animal->animal_book = $request->animal_animal_book;
        $animal->manager_id = $request->manager_id;

        $animal->save();
        return redirect()->route('animal.index')->with('success_message','Update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();
       return redirect()->route('animal.index')->with('success_message','Deletion successful');
    }
}
