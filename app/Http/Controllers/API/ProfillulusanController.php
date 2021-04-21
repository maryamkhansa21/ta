<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Profillulusan as ModelsProfillulusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfillulusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ModelsProfillulusan::latest()->paginate(10);
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
            'profillulusan' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string', 'max:1000'],
        ]);
        return ModelsProfillulusan::create([
            'profillulusan' => $request['profillulusan'],
            'deskripsi' => $request['deskripsi']

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
        $profillulusan = ModelsProfillulusan::find($id);
        return ['message' => $profillulusan];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelsProfilLulusan $modelProfilLulusan)
    {
        dd($modelProfilLulusan);
        $this->validate($request, [
            'profillulusan' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string', 'max:1000'],
        ]);

        $modelProfilLulusan->update($request->all());
        return ['message' => 'Profillulusan Update'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profillulusan = ModelsProfillulusan::findOrFail($id);
        $profillulusan->delete();
        return ['message' => 'Profillulusan Deleted'];
    }
}
