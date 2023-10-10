<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requestdonate extends Model
{
    use HasFactory;
    protected $fillable = ['name','blood_group','area','request_name','request_phone','request_details'];
}
