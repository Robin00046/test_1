<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    /** @use HasFactory<\Database\Factories\ProvinsiFactory> */
    use HasFactory;

    protected $fillable = [
        'nama',
    ];

    public function kabupaten()
    {
        return $this->hasMany(Kabupaten::class);
    }
}
