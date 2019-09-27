<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Departments extends Model
{
    use HasTranslations;
    protected $table = 'departments';
    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['departments'];
    public $translatable = ['departments'];
}
