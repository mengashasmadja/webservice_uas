<?php

namespace App\Http\Controllers;

use App\Atlit;
use Illuminate\Http\Request;

class AtlitController extends Controller
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
        // $atlit = atlit::all();
        $atlit = Atlit::with('olahraga')->get();
        return response()->json($atlit);
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
        return Atlit::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Atlit  $atlit
     * @return \Illuminate\Http\Response
     */
    public function show($atlit)
    {
        // $data = atlit::where('id_sewa', $atlit)->first();
        $data = Atlit::with('olahraga')-> where('id_atlit',$atlit)->first();
        if (!empty($data)){
            return $data;
        }

        return response()->json(['message' => 'Data Tidak Ditemukan']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Atlit  $atlit
     * @return \Illuminate\Http\Response
     */
    public function edit(Atlit $atlit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Atlit  $atlit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Atlit $atlit)
    {
        $atlit->update($request->all());
        return response()->json([
                  "message" => "Data Berhasil Di Update"
                ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Atlit  $atlit
     * @return \Illuminate\Http\Response
     */
    public function destroy($atlit)
    {
        $data = Atlit::where('id_atlit', $atlit)->first();
        if (empty($data)){
            return response()->json(['message' => 'Data Tidak Ditemukan']);
        }

        $data->delete();
        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }
}

