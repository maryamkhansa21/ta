<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Matkul as ModelsMatkul;
use App\Models\Kajian as ModelsKajian;
use App\Models\Detailmatkul as ModelsDetailmatkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return ModelsKajian::latest()
        //->with('detailprofillulusan', 'bahankajian', 'detailmatkul')
        //->paginate(10)
        //->toJson();
        $matkul = ModelsKajian::orderBy('created_at', 'ASC')->with('detailprofillulusan', 'bahankajian', 'detailmatkul')
            ->get()->toJson();
        return $matkul;
    }

    public function indexSemuaMatkul()
    {
        return ModelsDetailmatkul::get()->with('kajian')->paginate(10)->toJson();
    }
    public function storeSemuaMatkul(Request $request)
    {
        $this->validate($request, [
            'matkul_id' => ['required'],
            'dtlmatkul' => ['required', 'string', 'max:1000'],
        ]);
        return ModelsDetailmatkul::create([
            'matkul_id' => $request['matkul_id'],
            'dtlmatkul' => $request['dtlmatkul'],

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showSemuaMatkul($id)
    {
        $detailmatkul = ModelsDetailmatkul::find($id);
        return ['message' => $detailmatkul];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSemuaMatkul(Request $request, $id)
    {
        $detailmatkul = ModelsDetailmatkul::findOrFail($id);
        $this->validate($request, [
            'matkul_id' => ['required'],
            'dtlmatkul' => ['required', 'string', 'max:1000'],
        ]);
        $detailmatkul->update($request->all());
        return ['message' => 'Detail Mata Kuliah Update'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroySemuaMatkul($id)
    {
        $detailmatkul = ModelsDetailmatkul::findOrFail($id);
        $detailmatkul->delete();
        return ['message' => 'Detail Mata Kuliah Deleted'];
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
            'matkul' => ['required'],
        ]);
        return ModelsMatkul::create([
            'matkul' => $request['matkul'],

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
        $matkul = ModelsMatkul::find($id);
        return ['message' => $matkul];
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
