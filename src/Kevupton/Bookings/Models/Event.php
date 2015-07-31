<?php namespace Kevupton\Bookings\Models;

use Illuminate\Database\Eloquent\Model;
use Kevupton\BeastCore\BeastModel;

class Event extends BeastModel {
    // table name
    protected $table = 'events';
    public $timestamps = true;

    // validation rules
    public static $rules = array(
        'name' => 'required|max:64',
    );

    protected $fillable = array(
        'name'
    );

    public static $relationsData = array(
        'sessions' => array(self::HAS_MANY, Session::class)
    );
}
