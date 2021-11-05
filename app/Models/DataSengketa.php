<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSengketa extends Model
{
    use HasFactory;

    protected $fillable = [
        'no',
        'user_id',
        'file_penerima_kuasa_path',
        'file_penerima_kuasa_name',
        'file_surat_kuasa_path',
        'file_surat_kuasa_name',
        'file_form_pendaftaran_path',
        'file_form_pendaftaran_name',
        'foto_lahan_path',
        'foto_lahan_name',
        'keterangan',
        'status'
    ];

    protected $attributes = [
        'status' => 0,
    ];
}