<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;

class News extends Model
{
    use HasTranslations;

    protected $table='news';
    public $primaryKey = 'id';
    public $timestamps =true;
    protected $fillable = ['text','title', 'slug', 'img'];

    public $translatable = ['title','slug', 'text'];



    public function user(){
        return $this->belongsTo('App\User');
    }
}
