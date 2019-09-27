<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class About extends Model
{
    use HasTranslations;
    protected $table = 'about';
    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['about'];
    public $translatable = ['about'];
}