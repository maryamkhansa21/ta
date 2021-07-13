<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Bahankajian as ModelsBahankajian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BahankajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahankajian = ModelsBahankajian::orderBy('created_at', 'ASC')->get();
        return $bahankajian;
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
            'rumpunkeilmuan' => ['required', 'string', 'max:255'],
            'bahankajian' => ['required', 'string', 'max:1000'],
        ]);
        return ModelsBahankajian::create([
            'rumpunkeilmuan' => $request['rumpunkeilmuan'],
            'bahankajian' => $request['bahankajian']

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
        $bahankajian = ModelsBahankajian::find($id);
        return ['message' => $bahankajian];
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
        $bahankajian = ModelsBahankajian::findOrFail($id);
        $this->validate($request, [
            'rumpunkeilmuan' => ['required', 'string', 'max:255'],
            'bahankajian' => ['required', 'string', 'max:1000'],
        ]);
        $bahankajian->update($request->all());
        return ['message' => 'Bahan Kajian Update'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bahankajian = ModelsBahankajian::findOrFail($id);
        $bahankajian->delete();
        return ['message' => 'Bahan Kajian Deleted'];
    }
}
