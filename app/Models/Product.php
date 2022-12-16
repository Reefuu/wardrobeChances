<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "name",
        "size",
        "color",
        "bust",
        "length",
        "waist",
        "price",
        "image",
        "status",
        "subcat_id",
        "testimonial_id"
    ];

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class, '');
    }
    public function wishlist(): BelongsTo
    {
        return $this->belongsTo(Wishlist::class);
    }
    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }
    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function transactionproduct(): HasOne
    {
        return $this->hasOne(TransactionProduct::class);
    }
    public function testimonial(): HasOne
    {
        return $this->hasOne(Testimonial::class);
    }
}
