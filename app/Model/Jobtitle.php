<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Jobtitle extends Model
{
    public $timestamps = false;
    protected $table = 'list_empjobtitle';
    protected $primaryKey = 'listid';
    protected $fillable = [
        'str1', 'str2'
    ]; 
}
