<?php

namespace App\EQP\Models;

use Illuminate\Database\Eloquent\Model;

class OSTSession extends Model
{
    protected $table = 'session';
    protected $connection = 'mysqlOST';   
    protected $primaryKey = 'session_id';
}
