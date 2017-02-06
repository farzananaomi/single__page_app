<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $fillable=[
        'price','quantity','total','name'

    ];
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

}
