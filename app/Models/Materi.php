<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'deskripsi', 'gambar'];

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }
}
