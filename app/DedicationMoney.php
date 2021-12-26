<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DedicationMoney extends Model
{
    protected $guarded = array('id');
protected $table = 'dedication_moneys';
    // 以下を追記
    public static $rules = array(
        'date' => 'required',
        'money' => 'required|numeric',
    );
    //
public function dedicater()
{
    return $this->belongsTo( 'App\Dedicater');
}
    
}

