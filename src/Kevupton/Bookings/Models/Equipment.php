<?php namespace Kevupton\Bookings\Models;

use Kevupton\Ethereal\Models\Ethereal;

class Equipment extends Ethereal {
    // table name
    protected $table = 'equipment';
    public $timestamps = true;

    // validation rules
    public static $rules = array(
        'name' => 'required|max:64',
        'longitude' => 'required|numeric',
        'latitude' => 'required|numeric',
        'address' => 'required|max:150',
        'qty' => 'numeric|required'
    );

    protected $fillable = array(
        'name', 'description', 'longitude', 'latitude', 'address', 'qty'
    );

    public static $relationsData = array(
        'session_equipment' => array(self::HAS_MANY, SessionEquipment::class),
        'sessions' => array(self::HAS_MANY_THROUGH_CUSTOM, Session::class, SessionEquipment::class, null, 'id', null, 'session_id')
    );
}
