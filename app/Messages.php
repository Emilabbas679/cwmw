<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $table = 'messages';
    public $primaryKey ='id';
    public $timestamps = true;
    protected $fillable = ['text','name', 'surname', 'email'];
}
