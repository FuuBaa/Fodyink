<?php

namespace App\Http\Controllers;
use App\Models\Makanan;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makanan = Makanan::all();
        return $makanan;
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
        $table =  Makanan::create($request->all());

        return response()->json([
            'status' => "Data sudah diinputkan",
            "data" => $table
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
        $makanan = makanan::find($id);
        if ($makanan) {
            return response()->json([
                'data' => $makanan
            ]);
        }
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
        $makanan = makanan::find($id)->update($request->all());
        if ($makanan){
            return response([
                "status" => 200,
                "message" => "Data berhasil diubah",
                "data" => $makanan
            ]);
        }
        else{
            return response([
                "status" => 400,
                "message" => "Data gagal diubah",
            ]); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $makanan = makanan::where('id',$id)->first();
        if($makanan){
            $makanan->delete();
            return response()->json([
                "status" => "Data berhasil dihapus",
            ]);
        }
    }
}