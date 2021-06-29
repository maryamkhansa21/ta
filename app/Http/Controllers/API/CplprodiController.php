<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cplprodi as ModelsCplprodi;
use App\Models\Detailprofillulusan as ModelsDetailprofillulusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CplprodiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ModelsCplprodi::latest()->with('detailprofillulusan')->paginate(10);
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
            'unsur' => ['required'],
        ]);
        return ModelsCplprodi::create([
            'unsur' => $request['unsur'],

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
        $cplprodi = ModelsCplprodi::find($id);
        return ['message' => $cplprodi];
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
        $detailprofillulusan = ModelsDetailprofillulusan::findOrFail($id);
        $this->validate($request, [
            'unsur' => ['required'],
        ]);
        $detailprofillulusan->update($request->all());
        return ['message' => 'CPL Update'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
