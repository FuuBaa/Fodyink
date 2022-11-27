<?php

namespace App\Http\Controllers;
use App\Models\Pesanan;
use App\Models\Makanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = Pesanan::all();
        return $pesanan;
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
        $data_makanan = Makanan::where('id', $request->id_makanan)->first();
        $total_harga = $request->jumlah*$data_makanan->harga;

        $data = Pesanan::create([
            "id_makanan" => $request->id_makanan,
            "id_pemesan" => $request->id_pemesan,
            "jumlah" => $request->jumlah,
            "total_harga" => $total_harga,
            "alamat_pemesan" => $request->alamat_pemesan,
            "status" => 'sedang diproses',
        ]);

        if ($data) {
            return response([
                'status' => 201,
                'message' => "data uploaded successfully",
                'data' => $data
            ]);
        }else {
            return response([
                'status' => 400,
                'message' => "data upload failed",
                'data' => null
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pesanan = pesanan::find($id);
        if ($pesanan) {
            return response()->json([
                'data' => $pesanan
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_status (Request $request, $id)
    {
        $pesanan = pesanan::find($id)->update([
            "status" => $request->status,
        ]);
        if ($pesanan){
            return response([
                "status" => 200,
                "message" => "Data berhasil diubah",
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
        //
    }
}
