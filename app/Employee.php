<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'firstname', 'lastName', 'company_id', 'email', 'phone',
    ];
    
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $foreignKey = 'company_id';
}