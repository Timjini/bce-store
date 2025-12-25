<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class StockMovement extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['product_id', 'type', 'direction', 'quantity', 'reference_id'];

    protected static function boot(): void
    {
        parent::boot();
        static::creating(fn($model) => $model->id ??= (string) Str::uuid());
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
