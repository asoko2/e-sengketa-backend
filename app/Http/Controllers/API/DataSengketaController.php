<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DataSengketa;

class DataSengketaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // $fields = $request->validate([
        //     'user_id' => 'required|integer',
        //     'file_penerima_kuasa_path' => 'required|string',
        //     'file_surat_kuasa_path' => 'required|string',
        //     'file_form_pendaftaran_path' => 'required|string',
        //     'foto_lahan_path' => 'required|string',
        //     'keterangan' => 'required|string',
        // ]);

        $no = DataSengketa::orderBy('id','desc')->first();
        if($no == null){
            $no = 1;
        }else{
            $no = $no->id;
            $no += 1;
        }
        // dd($no);
        
        // dd($request->file('file_penerima_kuasa'));

        //Save File Penerima Kuasa
        $namePenerimaKuasaWithExt = $request->file('file_penerima_kuasa')->getClientOriginalName();
        $namePenerimaKuasa = pathinfo($namePenerimaKuasaWithExt, PATHINFO_FILENAME);
        $extensionPenerimaKuasa = $request->file('file_penerima_kuasa')->getClientOriginalExtension();
        $filenameSimpanPenerimaKuasa = $namePenerimaKuasa.'_'.time().'.'.$extensionPenerimaKuasa;
        $pathPenerimaKuasa = $request->file('file_penerima_kuasa')->storeAs('public/files', $filenameSimpanPenerimaKuasa);

        //Save File Penerima Kuasa
        $nameSuratKuasaWithExt = $request->file('file_surat_kuasa')->getClientOriginalName();
        $nameSuratKuasa = pathinfo($nameSuratKuasaWithExt, PATHINFO_FILENAME);
        $extensionSuratKuasa = $request->file('file_surat_kuasa')->getClientOriginalExtension();
        $filenameSimpanSuratKuasa = $nameSuratKuasa.'_'.time().'.'.$extensionSuratKuasa;
        $pathSuratKuasa = $request->file('file_surat_kuasa')->storeAs('public/files', $filenameSimpanSuratKuasa);

        //Save File Penerima Kuasa
        $nameFormPendaftaranWithExt = $request->file('file_form_pendaftaran')->getClientOriginalName();
        $nameFormPendaftaran = pathinfo($nameFormPendaftaranWithExt, PATHINFO_FILENAME);
        $extensionFormPendaftaran = $request->file('file_form_pendaftaran')->getClientOriginalExtension();
        $filenameSimpanFormPendaftaran = $nameFormPendaftaran.'_'.time().'.'.$extensionFormPendaftaran;
        $pathFormPendaftaran = $request->file('file_form_pendaftaran')->storeAs('public/files', $filenameSimpanFormPendaftaran);
        
        //Save File Penerima Kuasa
        $nameFotoLahanWithExt = $request->file('file_foto_lahan')->getClientOriginalName();
        $nameFotoLahan = pathinfo($nameFotoLahanWithExt, PATHINFO_FILENAME);
        $extensionFotoLahan = $request->file('file_penerima_kuasa')->getClientOriginalExtension();
        $filenameSimpanFotoLahan = $nameFotoLahan.'_'.time().'.'.$extensionFotoLahan;
        $pathFotoLahan = $request->file('file_penerima_kuasa')->storeAs('public/files', $filenameSimpanFotoLahan);
        try {
            //code...
            // $dataSengketa = DataSengketa::create([
            //     'user_id' => $fields['user_id'],
            //     'file_penerima_kuasa_path' => $fields['file_penerima_kuasa_path'],
            //     'file_surat_kuasa' => $fields['file_surat_kuasa'],
            //     'file_form_pendaftaran_path' => $fields['file_form_pendaftaran_path'],
            //     'foto_lahan_path' => $fields['foto_lahan_path'],
            //     'keterangan' => $fields['keterangan'],
            // ]);
            $dataSengketa = new DataSengketa;
            $dataSengketa->no = $no;
            $dataSengketa->user_id = $request['user_id'];
            $dataSengketa->file_penerima_kuasa_name = $filenameSimpanPenerimaKuasa;
            $dataSengketa->file_penerima_kuasa_path = $pathPenerimaKuasa;
            $dataSengketa->file_surat_kuasa_name = $filenameSimpanSuratKuasa;
            $dataSengketa->file_surat_kuasa_path = $pathSuratKuasa;
            $dataSengketa->file_form_pendaftaran_name = $filenameSimpanFormPendaftaran;
            $dataSengketa->file_form_pendaftaran_path = $pathFormPendaftaran;
            $dataSengketa->foto_lahan_name = $filenameSimpanFotoLahan;
            $dataSengketa->foto_lahan_path = $pathFotoLahan;
            $dataSengketa->keterangan = $request['keterangan'];
            $dataSengketa->save();
            // dd($dataSengketa);
    
            $response = [
                'message' => "Upload File Success"
            ];
    
            return response($response, 201);
        } catch (\Throwable $th) {
            $response = [
                'message' => $th
            ];

            return response($response, 400);
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
        //
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
    public function update(Request $request, $id)
    {
        //
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