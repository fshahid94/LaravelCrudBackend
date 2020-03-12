<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = false;
    protected $table = 'emp_main';
    protected $primaryKey = 'empid';
    protected $fillable = [
        'firstname', 'lastname', 'jobtitle','registration'
    ]; 
}
