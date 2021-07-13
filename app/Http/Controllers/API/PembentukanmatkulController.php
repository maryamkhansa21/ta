<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pembentukanmatkul as ModelsPembentukanmatkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class PembentukanmatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembentukanmatkul = ModelsPembentukanmatkul::orderBy('created_at', 'ASC')->with('detailmatkul')->get();
        return $pembentukanmatkul;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'smt' => ['required', 'string', 'max:20'],
        //     'dtlmatkul_id' => ['required'],
        // ]);
        foreach ($request['dataMatkul'] as $matkul) {
            ModelsPembentukanmatkul::create($matkul);
        };
        // return ModelsPembentukanmatkul::insert([
        //     $request['dataMatkul']
        // ]);
        return ($request['dataMatkul']);
    }

    public function totaltk($id)
    {
        $totaltk = ModelsPembentukanmatkul::with('tk')->where('tk', $id)->orderBy('created_at', 'ASC')->sum('tk')->get();
    }

    public function alltotaltk($id)
    {
        $alltotaltk = ModelsPembentukanmatkul::with('totaltk')->where('totaltk', $id)->orderBy('created_at', 'ASC')->sum('totaltk')->get();
    }

    public function besarsks($id)
    {
        $besarsks = ModelsPembentukanmatkul::with('totaltk')->where('totaltk', $id)->orderBy('created_at', 'ASC')->get();

        $total = 0;

        foreach ($besarsks as $d) {
            $total += ($d->totaltk / $d->alltotaltk) * 144;
        }

        //return view('tambahdetailsetoran', compact('setoran', 'detailsetoran', 'nasabah', 'sampah', 'total'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembentukanmatkul = ModelsPembentukanmatkul::find($id);
        return ['message' => $pembentukanmatkul];
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
        $pembentukanmatkul = ModelsPembentukanmatkul::findOrFail($id);
        $this->validate($request, [
            'tk' => ['required', 'string', 'max:10'],
            'totaltk' => ['required', 'string', 'max:10'],
            'besarsks' => ['required', 'string', 'max:10'],
            'pembulatansks' => ['required', 'string', 'max:10'],
            'psikomotorik' => ['required', 'string', 'max:10'],
            'jenismatkul' => ['required', 'string', 'max:10'],
            'jam' => ['required', 'string', 'max:10'],
            'smt' => ['required', 'string', 'max:20'],
            'dtlmatkul_id' => ['required'],
            'bahankajian_id' => ['required'],
        ]);
        $pembentukanmatkul->update($request->all());
        return ['message' => 'Pembentukan Mata Kuliah Update'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembentukanmatkul = ModelsPembentukanmatkul::findOrFail($id);
        $pembentukanmatkul->delete();
        return ['message' => 'Pembentukan Mata Kuliah Deleted'];
    }
}
