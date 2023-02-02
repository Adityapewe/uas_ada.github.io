<?php

namespace App\Http\Controllers;

use App\Doctors;
use App\Patients;
use App\Polyclinics;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patients::all();
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $polyclinics = Polyclinics::all();
        $doctors = Doctors::all();
        return view('patients.create', compact('polyclinics', 'doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Patients::create($request->all());
        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function show(Patients $patients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $polyclinics = Polyclinics::all();
        $doctors = Doctors::all();
        $patients = Patients::find($id);
        return view('patients.edit', compact('doctors', 'polyclinics', 'patients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'registration_code' => 'required',
            'name' => 'required',
            'birthdate' => 'required',
            'gender' => 'required',
            'polyclinic_id' => 'required',
            'doctor_id' => 'required',
            ]);
            $patients = Patients::find($id);
            $patients->registration_code = $request->registration_code;
            $patients->name = $request->name;
            $patients->birthdate = $request->birthdate;
            $patients->gender = $request->gender;
            $patients->polyclinic_id = $request->polyclinic_id;
            $patients->doctor_id = $request->doctor_id;
            $patients->save();
            return redirect()->route('patients.index')->with('success', 'Patiens updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patients = Patients::find($id);
        $patients->delete();
        return redirect()->route('patients.index')->with('success', 'Patiens deleted!');
    }
}
