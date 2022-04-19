<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{

    protected $guarded = []; // you can use $guarded instead of $fillable

    // protected $fillable = [
    //     'Product_name',
    //     'section_id',
    //     'description',
    // ];


    public function section()
    {
        return $this->belongsTo('App\sections');
    }

}
