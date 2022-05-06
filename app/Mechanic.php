<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Mechanic extends Model
{
    use HasTranslations;

    protected $guarded=['id'];

    public $translatable = ['name'];




}
