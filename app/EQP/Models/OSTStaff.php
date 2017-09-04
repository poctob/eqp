<?php

namespace App\EQP\Models;

use Illuminate\Database\Eloquent\Model;
use MichaelAChrisco\ReadOnly\ReadOnlyTrait;

class OSTStaff extends Model
{
    use ReadOnlyTrait;
    
    protected $table = 'staff';
    protected $connection = 'mysqlOST'; 
    protected $primaryKey = 'staff_id';  
}
