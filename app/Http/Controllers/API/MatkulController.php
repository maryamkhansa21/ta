<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Matkul as ModelsMatkul;
use App\Models\Kajian as ModelsKajian;
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
        return ModelsKajian::latest()
            ->with('detailprofillulusan', 'bahankajian', 'detailmatkul')
            ->paginate(10)
            ->toJson();
    }

    public function indexSemuaMatkul()
    {
        return ModelsKajian::latest()->paginate(10)->toJson();
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
