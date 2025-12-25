<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'order_id',
        'product_id',
        'type',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'zip',
        'country',
        'contact_name',
        'contact_phone',
    ];

    protected static function booted()
    {
        static::creating(function ($address) {
            if (empty($address->id)) {
                $address->id = Str::uuid();
            }
        });
    }

    // Relations
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
