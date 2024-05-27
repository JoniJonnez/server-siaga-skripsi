<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuratPengajuan extends Model
{
    use HasFactory;
    protected $table = 'surat_pengajuans',
        $guarded = ['id'];

    public $timestamps = false;

    protected $fillable = ['user_id', 'komunitas_id', 'isian', 'tanggapan_surat', 'surat_id', 'file_surat', 'keperluan_surat', 'status', 'created_at', 'updated_at'];

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surat_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
