<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Bahankajian;
use App\Models\Detailprofillulusan;
use App\Models\Kajian;
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
        // return ModelsKajian::latest()->with('detailprofillulusan', 'bahankajian')->paginate(1)->toJson();
        $kajian = ModelsKajian::orderBy('created_at', 'ASC')->with('detailprofillulusan', 'bahankajian')->paginate(1)->toJson();
        return $kajian;
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
            'bahankajians' => ['required'],
            'matkul' => ['required', 'string', 'max:255'],
        ]);
        $kajian = new ModelsKajian();
        $kajian->matkul = $request['matkul'];

        $kajian->save();

        $bahankajians = Bahankajian::find($request['bahankajians']);
        $details = Detailprofillulusan::find($request['details']);
        $kajian->bahankajian()->attach($bahankajians);
        $kajian->detailprofillulusan()->attach($details);

        return 'Kajian sukses dibuat!';
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
            'details' => ['required'],
            'bahankajians' => ['required'],
            'matkul' => ['required', 'string', 'max:255'],
        ]);
        $kajian->matkul = $request->matkul;
        $kajian->detailprofillulusan()->sync($request['details']);
        $kajian->bahankajian()->sync($request['bahankajians']);
        $kajian->save();
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
    public function testmultipleupdate(Request $request)
    {
        $input = $request->all();
        $data_array = $request['data_array'];
        // $request['data_array'] = implode(',', $data_array);

        // User::create($input);
        return $data_array;
    }
}
