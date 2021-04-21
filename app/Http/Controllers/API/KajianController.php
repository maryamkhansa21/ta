<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kajian as ModelsKajian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ModelsKajian::latest()->with('detailprofillulusan')->paginate(10);
        return ModelsKajian::latest()->with('bahankajian')->paginate(10);
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
            'detail_id' => ['required'],
            'bahankajian_id' => ['required'],
            'matkul' => ['required', 'string', 'max:255'],
        ]);
        return ModelsKajian::create([
            'detail_id' => $request['detail_id'],
            'bahankajian_id' => $request['bahankajian_id'],
            'matkul' => $request['matkul']

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
        $kajian = ModelsKajian::find($id);
        return ['message' => $kajian];
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
        $kajian = ModelsKajian::findOrFail($id);
        $this->validate($request, [
            'detail_id' => ['required'],
            'bahankajian_id' => ['required'],
            'matkul' => ['required', 'string', 'max:255'],
        ]);
        $kajian->update($request->all());
        return ['message' => 'Penetapan Mata Kulian Update'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kajian = ModelsKajian::findOrFail($id);
        $kajian->delete();
        return ['message' => 'Penetapan Mata Kulian Deleted'];
    }
}
