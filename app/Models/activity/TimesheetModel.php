<?php

namespace App\Models\activity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimesheetModel extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'timesheet';

    protected $fillable = [
        'date',
        'timestart',
        'timefinish',
        'employees_id',
        'serviceused_id',
        'description'
    ];
}
