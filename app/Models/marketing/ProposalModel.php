<?php

namespace App\Models\marketing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalModel extends Model
{
    use HasFactory;

    protected $connection = 'mysql_marketing';
    protected $table = 'proposal'; // atau nama table yang sesuai
    
    protected $fillable = [];
}
