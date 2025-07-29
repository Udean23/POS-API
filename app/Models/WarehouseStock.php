<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WarehouseStock extends Model
{
    use HasFactory, HasUuids;
    
    public $incrementing = false;
    protected $keyType = "string";
    protected $primaryKey = "id";

    protected $guarded = [];

    public function productDetail(): BelongsTo
    {
        return $this->belongsTo(ProductDetail::class)->where('is_delete',0);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
