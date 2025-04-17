<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSale extends Model
{
    use HasFactory;

    protected $table = 'detail_sales';

    protected $fillable = ['sale_id', 'product_id', 'qty', 'price_pcs', 'sub_total'];

    public function penjualan()
    {
        return $this->belongsTo(Sale::class);
    }

    public function produk()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
