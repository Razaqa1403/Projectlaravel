<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksimeeting extends Model
{
    use HasFactory;

    protected $table = 'transaksimeeting';
    protected $fillable = [
        'jobsite', 'nama_meeting', 'jenis_meeting', 'tempat', 'tanggal', 'waktu', 'hour', 'pemimpin', 'notulen', 'snack', 'agenda', 'notes', 'peserta'
    ];

    public function relationToPemimpin () {
        return $this->belongsTo(karyawan::class, 'pemimpin', 'nick');
    }

    public function relationToNotulen(){
        return $this->belongsTo(karyawan::class, 'notulen', 'nick' );
    }

    public $timestamps = false;
}
