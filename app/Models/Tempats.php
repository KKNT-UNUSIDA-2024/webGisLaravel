<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tempats extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'nama_tempat',
        'Kategori_id',
        'latitude',
        'longitude',
        'deskripsi',
        'foto',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'Kategori_id', 'id');
    }
}
