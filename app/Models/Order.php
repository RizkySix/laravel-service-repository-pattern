<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'transaction_id';
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    public function reference()
    {
        return $this->hasOne(ReferenceOrder::class , 'reference_id');
    }
}
