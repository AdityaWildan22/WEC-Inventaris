<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perbaikan extends Model
{
    use HasFactory;
    protected $table = "inv_perbaikan";
    protected $primaryKey = "id_perbaikan";
    protected $keyType = "string";
    public $incrementing = false;
    protected $guarded = ['id_perbaikan']; 
    //protected $fillable = ['id_perbaikan','kd_barang','tgl_perbaikan','kerusakan','solusi','status'];
}
