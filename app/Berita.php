<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'beritas';

    protected $fillable = [
      'judul',
      'isi',
      'id_kategori',
      'id_pembuat'
    ];

    public function kategori(){
      return $this->belongsTo(Kategori::class,'id_kategori');
    }

    public function users(){
      return $this->belongsTo(User::class,'id_pembuat');
    }
}
