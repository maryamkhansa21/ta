<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cplprodi as ModelsCplprodi;
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
            'code_id' => ['required'],
            'unsur' => ['required', 'string', 'max:1000'],
        ]);
        return ModelsCplprodi::create([
            'code_id' => $request['code_id'],
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
        $cplprodi = ModelsCplprodi::findOrFail($id);
        $this->validate($request, [
            'code_id' => ['required'],
            'detail_id' => ['required'],
            'unsur' => ['required', 'string', 'max:1000'],
        ]);
        $cplprodi->update($request->all());
        return ['message' => 'CPL Prodi Update'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cplprodi = ModelsCplprodi::findOrFail($id);
        $cplprodi->delete();
        return ['message' => 'CPL Prodi Deleted'];
    }
}
