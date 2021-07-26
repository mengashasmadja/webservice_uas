<?php

namespace App\Http\Controllers;

use App\Olahraga;
use Illuminate\Http\Request;

class OlahragaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
// except kecuali
// only hanya
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        // $olahraga = olahraga::all();
        $olahraga = Olahraga::all();
        return response()->json($olahraga);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Olahraga::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Olahraga  $olahraga
     * @return \Illuminate\Http\Response
     */
    public function show($olahraga)
    {
        // $data = olahraga::where('id_sewa', $olahraga)->first();
        $data = Olahraga::where('id_olahraga', $olahraga)->first();
        if (!empty($data)){
            return $data;
        }

        return response()->json(['message' => 'Data Tidak Ditemukan']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Olahraga  $olahraga
     * @return \Illuminate\Http\Response
     */
    public function edit(Olahraga $olahraga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\olahraga  $olahraga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Olahraga $olahraga)
    {
        $olahraga->update($request->all());
        return response()->json([
                  "message" => "Data Berhasil Di Update"
                ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\olahraga  $olahraga
     * @return \Illuminate\Http\Response
     */
    public function destroy($olahraga)
    {
        $data = Olahraga::where('id_olahraga', $olahraga)->first();
        if (empty($data)){
            return response()->json(['message' => 'Data Tidak Ditemukan']);
        }

        $data->delete();
        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }
}

