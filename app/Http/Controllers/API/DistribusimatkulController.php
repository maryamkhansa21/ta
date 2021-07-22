<?php

namespace App\Http\Controllers\API;

use App\Models\Distribusimatkul as ModelsDistribusimatkul;
use App\Models\Pembentukanmatkul as ModelsPembentukanmatkul;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class DistribusimatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distribusimatkul = ModelsDistribusimatkul::orderBy('created_at', 'ASC')->with('pembentukanmatkul', 'detailmatkul')->get();
        return $distribusimatkul;
    }

    public function totalsks($id)
    {

        $totalsks = ModelsDistribusimatkul::with('pembentukanmatkul')->where('pembulatansks', $id)->orderBy('created_at', 'ASC')->sum('pembulatansks')->get();
    }
    public function totaljam($id)
    {

        $totaljam = ModelsDistribusimatkul::with('pembentukanmatkul')->where('jam', $id)->orderBy('created_at', 'ASC')->sum('jam')->get();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'smt_id' => ['required'],
            'sks_id' => ['required'],
            'jam_id' => ['required'],
            'dtlmatkul_id' => ['required'],
            'jenismatkul_id' => ['required'],
            'totalsks' => ['required', 'string', 'max:255'],
            'totaljam' => ['required', 'string', 'max:255'],
        ]);
        return ModelsDistribusimatkul::create([
            'smt_id' => $request['smt_id'],
            'sks_id' => $request['sks_id'],
            'jam_id' => $request['jam_id'],
            'dtlmatkul_id' => $request['dtlmatkul_id'],
            'jenismatkul_id' => $request['jenismatkul_id'],
            'totalsks' => $request['totalsks'],
            'totaljam' => $request['totaljam']

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $distribusimatkul = ModelsDistribusimatkul::find($id);
        return ['message' => $distribusimatkul];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
