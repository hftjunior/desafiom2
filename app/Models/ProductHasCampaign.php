<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductHasCampaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'campaign_id',
        'discont'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
