<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferenceOrder extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'reference_id';
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    public function order()
    {
        return $this->belongsTo(Order::class , 'reference_id');
    }
}
