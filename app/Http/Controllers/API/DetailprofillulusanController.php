<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Detailprofillulusan as ModelsDetailprofillulusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DetailprofillulusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ModelsDetailprofillulusan::latest()->with('profillulusan')->paginate(10);
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
            'code' => ['required', 'string', 'max:255'],
            'detail' => ['required', 'string', 'max:1000'],
            'profil_id' => ['required'],
        ]);
        return ModelsDetailprofillulusan::create([
            'code' => $request['code'],
            'detail' => $request['detail'],
            'profil_id' => $request['profil_id']

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
        $detailprofillulusan = ModelsDetailprofillulusan::find($id);
        return ['message' => $detailprofillulusan];
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
            'code' => ['required', 'string', 'max:255'],
            'detail' => ['required', 'string', 'max:1000'],
            'profil_id' => ['required'],
        ]);
        $detailprofillulusan->update($request->all());
        return ['message' => 'Detail Profil Lulusan Update'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detailprofillulusan = ModelsDetailprofillulusan::findOrFail($id);
        $detailprofillulusan->delete();
        return ['message' => 'Detail Profil Lulusan Deleted'];
    }
}
