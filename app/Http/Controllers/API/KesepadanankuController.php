<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kesepadananku as ModelsKesepadananku;
use App\Models\Detailprofillulusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KesepadanankuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ModelsKesepadananku::latest()->with('detailprofillulusan', 'dashboard')->paginate(10)->toJson();
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
            'kuprodi' => ['required', 'string', 'max:1000'],
        ]);
        return ModelsKesepadananku::create([
            'kuprodi' => $request['kuprodi']

        ]);
        $kesepadananku = new ModelsKesepadananku();

        $kesepadananku->save();

        $details = Detailprofillulusan::find($request['details']);
        $kesepadananku->detailprofillulusan()->attach($details);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kesepadananku = ModelsKesepadananku::find($id);
        return ['message' => $kesepadananku];
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
        $kesepadananku = ModelsKesepadananku::findOrFail($id);
        $this->validate($request, [
            'kuprodi' => ['required', 'string', 'max:1000'],
        ]);
        $kesepadananku->update($request->all());
        return ['message' => 'Kesepadanan Keterampilan Umum Update'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detailprofillulusan = ModelsKesepadananku::findOrFail($id);
        $detailprofillulusan->delete();
        return ['message' => 'Kesepadanan Keterampilan Umum Update Deleted'];
    }
}
