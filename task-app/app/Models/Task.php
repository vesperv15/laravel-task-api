<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //veritabanına dısarıdan doldurulmasına izin vermediğimiz kısımlar

    protected $fillable = [
        'title',
        'description',
        'is_completed',
    ];
}
