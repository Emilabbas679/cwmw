<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Gallery extends Model
{
//    use HasTranslations;
    use HasTranslations;
    protected $table = 'gallery';
    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['title', 'img'];
    public $translatable = ['title'];
}
