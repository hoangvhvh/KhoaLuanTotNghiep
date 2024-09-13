<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class custommer extends Model
{
    use HasFactory;
    protected $table="tbl_customers";
    protected $fillable=[
    	'customer_name',
    	'customer_password',
    	'customer_phone',
    	'customer_email',
        'code',
        'code_time'
    ];
    protected $primaryKey="customer_id";
}
