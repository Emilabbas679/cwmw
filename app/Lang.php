<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{

    protected $table = 'lang';
    protected $fillable=['name','short_name'];
}
