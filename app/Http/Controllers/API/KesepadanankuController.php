<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kesepadananku as ModelsKesepadananku;
use App\Models\Dashboard;
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
        $kesepadananku = ModelsKesepadananku::orderBy('created_at', 'ASC')->with('detailprofillulusan')->paginate(100)->toJson();
        return $kesepadananku;
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
            'details' => ['required'],
            'kudikti' => ['required', 'string', 'max:1000'],
        ]);
        $kesepadananku = new ModelsKesepadananku();
        $kesepadananku->kudikti = $request['kudikti'];

        $kesepadananku->save();

        $details = Detailprofillulusan::find($request['details']);
        $kesepadananku->detailprofillulusan()->attach($details);

        return 'Kesepadanan sukses dibuat!';
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
            'details' => ['required'],
            'kudikti' => ['required', 'string', 'max:1000'],
        ]);
        $kesepadananku->kudikti = $request->kudikti;
        $kesepadananku->detailprofillulusan()->sync($request['details']);
        $kesepadananku->save();
        return ['message' => 'Kesepadanan Update'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kesepadananku = ModelsKesepadananku::findOrFail($id);
        $kesepadananku->delete();
        return ['message' => 'Kesepadanan Keterampilan Umum Update Deleted'];
    }
    public function multipleupdate(Request $request)
    {
        $input = $request->all();
        $data_array = $request['data_array'];
        // $request['data_array'] = implode(',', $data_array);

        // User::create($input);
        return $data_array;
    }
}
