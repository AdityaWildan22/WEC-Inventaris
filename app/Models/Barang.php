<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = "inv_barang";
    protected $primaryKey = "id_barang";
    protected $keyType = "string";
    public $incrementing = false;
    protected $guarded = ['id_barang']; 
}
