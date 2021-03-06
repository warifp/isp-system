<?php

namespace GMedia\IspSystem\Models;

use Illuminate\Database\Eloquent\Model;

class ArInvoiceScheme extends Model
{
    protected $table = 'ar_invoice_scheme';

    protected $fillable = [
        // 'id',
        'payer',
        'payment_scheme_id',
        'date_of_invoice',
        'created_at',
        'updated_at',

        'name',
    ];

    protected $hidden = [];

    protected $casts = [
        'id' => 'integer',
        'payer' => 'integer',
        'payment_scheme_id' => 'integer',
        'date_of_invoice' => 'date:Y-m-d',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',

        'name' => 'string',
    ];

    public function payer_ref()
    {
        return $this->belongsTo(Customer::class, 'payer');
    }

    public function payment_scheme()
    {
        return $this->belongsTo(PaymentScheme::class);
    }

    public function scheme_customers()
    {
        return $this->hasMany(ArInvoiceSchemeCustomer::class);
    }

    public function invoices()
    {
        return $this->hasMany(ArInvoice::class);
    }
}
