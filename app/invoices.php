<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class invoices extends Model
{
    // protected $guarded = [];

    use SoftDeletes;
    protected $fillable = [
        'invoice_number',
        'invoice_Date',
        'Due_date',
        'product',
        'section_id',
        'Amount_collection',
        'Amount_Commission',
        'Discount',
        'Value_VAT',
        'Rate_VAT',
        'Total',
        'Status',
        'Value_Status',
        'note',
        'Payment_Date',
    ];

    protected $dates = ['deleted_at'];  // you can do without it

    public function section(){

        return $this->belongsTo('App\sections');
    }
}
