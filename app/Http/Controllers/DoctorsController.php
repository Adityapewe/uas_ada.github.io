<?php

namespace App\Http\Controllers;

use App\Doctors;
use App\Polyclinics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctors::all();
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $polyclinics = Polyclinics::all();
        return view('doctors.create', compact('polyclinics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'polyclinic_id' => 'required',
            'registration_code' => 'unique',
            ]);
            $doctor = new Doctors;
            $date1= date('Ymd',strtotime("-1 days"));
            $date2= "20230131";
            if ($date2 != $date1){
                $getName = explode(" ", $request->name);
                $getFirstCharacter = "";
                foreach ($getName as $f) {
                    $getFirstCharacter .= mb_substr($f, 0, 1);
                }
                $code = DB::table('doctors')->whereDate('created_at', $date2)->max(DB::raw('substr(registration_code, -1)'));
                $addNol = '';
                $nextcode1 = substr($code, -3);
                $nextcode1++;
                if (strlen($nextcode1) == 1) {
                    $addNol = "00";
                } elseif (strlen($nextcode1) == 2) {
                    $addNol = "0";
                }
                $doctor->registration_code = "D".$getFirstCharacter.$date2.$addNol.$nextcode1;
            } elseif ($date2 == $date1) {
                $getName = explode(" ", $request->name);
                $getFirstCharacter = "";
                foreach ($getName as $f) {
                    $getFirstCharacter .= mb_substr($f, 0, 1);
                }
                $code = DB::table('doctors')->whereDate('created_at', $date1)->max(DB::raw('substr(registration_code, -1)'));
                $addNol = '';
                $nextcode1 = substr($code, -3);
                $nextcode1++;
                if (strlen($nextcode1) == 1) {
                    $addNol = "00";

                } elseif (strlen($nextcode1) == 2) {
                    $addNol = "0";
                }
                $doctor->registration_code = "D".$getFirstCharacter.$date1.$addNol.$nextcode1;
            }
            $doctor->name = $request->name;
            $doctor->polyclinic_id = $request->polyclinic_id;
            $doctor->save();
            return redirect()->route('doctor.index')->with('success', 'Doctor Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function show(Doctors $doctors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $polyclinics = Polyclinics::all();
        $doctors = Doctors::find($id);
        return view('doctors.edit', compact('doctors', 'polyclinics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'registration_code' => 'required',
            'name' => 'required',
            'polyclinic_id' => 'required',
            ]);
            $doctors = Doctors::find($id);
            $doctors->registration_code = $request->registration_code;
            $doctors->name = $request->name;
            $doctors->polyclinic_id = $request->polyclinic_id;
            $doctors->save();
            return redirect()->route('doctors.index')->with('success', 'Doctors updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctors = Doctors::find($id);
        $doctors->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctors deleted!');
    }
}
