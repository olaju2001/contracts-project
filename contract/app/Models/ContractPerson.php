<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ContractPerson extends Model
{
    use HasFactory, LogsActivity;

    /**
     * @var string[]
     */
    protected static $logAttributes =[
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'birth_date',
        'birth_place',
        'marital_status',
        'nationality',
        'profession',
        'address',
        'phone_number',
        'type',
        'kinship_degree',
        'contract_id',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'birth_date',
        'birth_place',
        'marital_status',
        'nationality',
        'profession',
        'address',
        'phone_number',
        'type',
        'kinship_degree',
        'contract_id',
    ];
}
