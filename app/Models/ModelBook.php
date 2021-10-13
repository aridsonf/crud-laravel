<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelBook extends Model
{
    protected $table = 'book';
    protected $fillable = ['title', 'prices', 'id_user', 'pages'];

    public function relUsers(){
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
}
