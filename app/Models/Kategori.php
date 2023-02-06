<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = "inv_kategori";
    protected $primaryKey = "id_kat";
    protected $keyType = "string";
    public $incrementing = false;
    protected $guarded = ['id_kat']; 
}
