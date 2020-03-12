<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    public $timestamps = false;
    protected $table = 'list_empregistration';
    protected $primaryKey = 'listid';
    protected $fillable = [
        'str1', 'str2'
    ]; 
}
