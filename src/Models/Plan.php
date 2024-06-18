<?php

namespace Muzammil9555\SubscriptionPlansForStripe\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'description', 'periodicity_type', 'stripe_price_plan_id'
    ];

    public function features()
    {
        return $this->hasMany(PlanFeature::class);
    }
}
