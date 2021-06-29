<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Profillulusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfillulusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return Profillulusan::latest()->paginate(100);
        
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
        return Profillulusan::create([
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
        $profillulusan = Profillulusan::find($id);
        return ['message' => $profillulusan];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfilLulusan $profillulusan)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'profillulusan' => 'required',
            'deskripsi' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ]);
        }

        $profillulusan->profillulusan = $input['profillulusan'];
        $profillulusan->deskripsi = $input['deskripsi'];
        $profillulusan->save();

        return response()->json([
            'data' => $profillulusan
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profillulusan = Profillulusan::findOrFail($id);
        $profillulusan->delete();
        return ['message' => 'Profillulusan Deleted'];
    }
}
