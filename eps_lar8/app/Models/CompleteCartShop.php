<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompleteCartShop extends Model
{
    protected $visible = ['status'];
    public $timestamps = false;
    protected $table = 'complete_cart_shop';
    protected $primaryKey = 'id'; 
}