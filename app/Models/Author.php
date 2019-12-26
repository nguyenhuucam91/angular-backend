<?php

namespace App\Models;

class Author extends BaseModel
{
    protected $table = 'authors';

    protected $fillable = ['name'];
}
