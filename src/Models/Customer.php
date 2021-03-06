<?php

namespace GMedia\IspSystem\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    protected $attributes = [
        'money' => 0,
    ];

    protected $fillable = [
        // 'id',
        'cid',
        'name',
        'registration_date',
        'province_id',
        'district_id',
        'sub_district_id',
        'village_id',
        'money',
        'address',
        'latitude',
        'longitude',
        'email',
        'npwp',

        'previous_isp_id',
        'previous_isp_price',
        'previous_isp_bandwidth',
        'previous_isp_feature',
        'previous_isp_bandwidth_unit_id',
        
        'approved_by_marketing_manager',
        'approved_by_marketing_manager_id',
        'approved_by_marketing_manager_date',
        
        'branch_id',

        'created_at',
        'updated_at',

        'user_id',
        
        'previous_isp_bandwidth_type_id',

        'referrer',
        'referrer_used_for_discount',        

        'identity_card',

        'postal_code',
        'fax',

        'uuid',
        'alias_name',
        'identity_card_file',
        'house_photo',
    ];

    protected $hidden = [];

    protected $casts = [
        'id' => 'integer',
        'cid' => 'string',
        'name' => 'string',
        'registration_date' => 'date:Y-m-d',
        'province_id' => 'integer',
        'district_id' => 'integer',
        'sub_district_id' => 'integer',
        'village_id' => 'integer',
        'money' => 'integer',
        'address' => 'string',
        'latitude' => 'double',
        'longitude' => 'double',
        'email' => 'string',
        'npwp' => 'string',

        'previous_isp_id' => 'integer',
        'previous_isp_price' => 'integer',
        'previous_isp_bandwidth' => 'integer',
        'previous_isp_feature' => 'string',
        'previous_isp_bandwidth_unit_id' => 'integer',
        
        'approved_by_marketing_manager' => 'boolean',
        'approved_by_marketing_manager_id' => 'integer',
        'approved_by_marketing_manager_date' => 'date:Y-m-d',
        
        'branch_id' => 'integer',
        
        'created_at' => 'datetime',
        'updated_at' => 'datetime',

        'user_id' => 'integer',

        'previous_isp_bandwidth_type_id' => 'integer',

        'referrer' => 'integer',
        'referrer_used_for_discount' => 'boolean',

        'identity_card' => 'string',

        'postal_code' => 'string',
        'fax' => 'string',

        'uuid' => 'string',
        'alias_name' => 'string',
        'identity_card_file' => 'string',
        'house_photo' => 'string',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function sub_district()
    {
        return $this->belongsTo(SubDistrict::class);
    }

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function previous_isp()
    {
        return $this->belongsTo(Isp::class);
    }

    public function previous_isp_bandwidth_unit()
    {
        return $this->belongsTo(BandwidthUnit::class);
    }

    public function approved_by_marketing_manager()
    {
        return $this->belongsTo(User::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function previous_isp_bandwidth_type()
    {
        return $this->belongsTo(BandwidthType::class);
    }

    public function referrer()
    {
        return $this->belongsTo(Customer::class, 'referrer');
    }

    public function alternative_emails()
    {
        return $this->hasMany(CustomerAlternativeEmail::class);
    }

    public function phone_numbers()
    {
        return $this->hasMany(CustomerPhoneNumber::class);
    }

    public function customer_products()
    {
        return $this->hasMany(CustomerProduct::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, CustomerProduct::class)->withPivot('id');
    }

    public function refers()
    {
        return $this->hasMany(Customer::class, 'referrer');
    }

    public function invoice_scheme_pays()
    {
        return $this->hasMany(ArInvoiceScheme::class, 'payer');
    }

    public function invoice_scheme_customers()
    {
        return $this->hasMany(ArInvoiceSchemeCustomer::class);
    }

    public function invoice_pays()
    {
        return $this->hasMany(ArInvoice::class, 'payer');
    }

    public function invoice_customers()
    {
        return $this->hasMany(ArInvoiceCustomer::class);
    }
}
