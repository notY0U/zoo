<?php

namespace App\Http\Controllers;

use Validator;
use PDF;
use App\Animal;
use App\Specie;
use App\Manager;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $managers = Manager::all();
        return view('manager.index', ['managers' => $managers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $species = Specie::all();
        return view('manager.create', ['species' => $species]);
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
           'manager_name' => ['required', 'min:3', 'max:64'],
           'manager_surname' => ['required', 'min:3', 'max:64'],
       ],
       [
           'manager_name.require' => 'Name field cannot be empty',
           'manager_surname.require'  => 'Surname field cannot be empty',
           'manager_name.min' => 'Name too short',
           'manager_surname.min' => 'Surname too short',
           'manager_name.max' => 'Name too long',
           'manager_surname.max' => 'Surname too long'
       ]
       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }

        $manager = new Manager;
        $manager->name = $request->manager_name;
        $manager->surname = $request->manager_surname;
        $manager->specie_id = $request->specie_id;
        $manager->save();
        return redirect()->route('manager.index')->with('success_message','Addition successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager)
    {
        $species = Specie::all();
        return view('manager.edit', ['manager' => $manager, 'species' => $species]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manager $manager)
    {
        $validator = Validator::make($request->all(),
        [
            'manager_name' => ['required', 'min:3', 'max:64'],
            'manager_surname' => ['required', 'min:3', 'max:64'],
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $manager->name = $request->manager_name;
        $manager->surname = $request->manager_surname;
        $manager->specie_id = $request->specie_id;
        $manager->save();
        return redirect()->route('manager.index')->with('success_message','Update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        if($manager->animalManage->count()){
            return redirect()->route('manager.index')->with('info_message', 'Manager assigned, cannot delete');
        }elseif($manager->manageSpecie->count()){
            return redirect()->route('manager.index')->with('info_message', 'Species assigned, cannot delete');
        }
        
        $manager->delete();
       return redirect()->route('manager.index')->with('success_message','Removal successful');
    }
    public function pdf(Manager $manager){
        // $manager=Manager::find(request()->manager_id);
        // $data = Manager::get();
        $pdf = PDF::loadView('manager.pdf', ['manager'=> $manager]);
    // dd($pdf);        
        return $pdf->download('manager.pdf');
    }
}
// $manager->name.'-'.$manager->surname.