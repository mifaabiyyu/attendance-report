<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{
    use HasFactory;
    protected $table = 'perizinan';
    protected $primaryKey = 'id_izin';
    protected $fillable = ['id_user', 'jenis', 'datestart', 'status','deskripsi', 'created_at', 'updated_at'];
}
