<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Bahankajian;
use App\Models\Pembentukanmatkul as ModelsPembentukanmatkul;
use App\Models\Kajian;
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

    public function bkajian()
    {
        $bkajian = Kajian::orderBy('created_at', 'ASC')->with('bahankajian', 'detailprofillulusan')
            ->get()->toJson();
        return $bkajian;
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
            'totaltk' => ['required', 'integer', 'max:255'],
            'alltotaltk' => ['required', 'integer', 'max:255'],
            'besarsks' => ['required', 'numeric', 'max:255'],
            'pembulatansks' => ['required', 'integer', 'max:255'],
            'jam' => ['required', 'integer', 'max:255'],
            'psikomotorik' => ['required', 'string', 'max:255'],
            'jenismatkul' => ['required', 'string', 'max:255'],

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
