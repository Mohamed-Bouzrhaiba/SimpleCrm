<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /** @use HasFactory<\Database\Factories\ClientFactory> */
    use HasFactory;
    protected $fillable = [
        'client_name',
        'client_email',
        'client_phone_number',
        'company_name',
        'company_address',
        'company_city',
        'company_zip',
        'company_vat'
    ];
}
