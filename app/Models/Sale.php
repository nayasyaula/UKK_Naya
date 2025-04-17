<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'member_id',
        'status_member',
        'poin_used',
        'poin_reward',
        'total_price',
        'total_pay',
        'amount',
    ];

    public function detailPenjualans()
    {
        return $this->belongsTo(DetailSale::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'staff_id');
        
    }


    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
