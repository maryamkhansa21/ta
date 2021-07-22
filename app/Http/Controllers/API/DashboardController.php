<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Dashboard as ModelsDashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ModelsDashboard::latest()->paginate(100);
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
            'programstudi' => ['required', 'string', 'max:255'],
            'jenjang' => ['required', 'string', 'max:255'],

        
        ]);
        return ModelsDashboard::create([
            'programstudi' => $request['programstudi'],
            'jenjang' => $request['jenjang'],

            

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
        $dashboard = ModelsDashboard::find($id);
        return ['message' => $dashboard];
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
        $dashboard = ModelsDashboard::findOrFail($id);
        $this->validate($request, [
            'programstudi' => ['required', 'string', 'max:255'],
            'jenjang' => ['required', 'string', 'max:255'],
   
        ]);
        $dashboard->update($request->all());
        return ['message' => 'Dashboard Update'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dashboard = ModelsDashboard::findOrFail($id);
        $dashboard->delete();
        return ['message' => 'Dashboard Deleted'];
    }
}
