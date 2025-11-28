<?php

namespace App\Models\marketing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceusedModel extends Model
{
    use HasFactory;
    protected $connection = 'mysql_marketing';
    protected $table = 'serviceused'; // atau nama table yang sesuai
    
    protected $fillable = [
        'proposal_id',
        'service_name',
        'status'
    ];
}
