<?php namespace Kevupton\Bookings\Models;

use Kevupton\Ethereal\Models\Ethereal;

class SessionEquipment extends Ethereal {
    // table name
    protected $table = 'session_equipment';
    protected $primaryKey = array('session_id', 'equipment_id');

    // validation rules
    public static $rules = array(
        'session_id' => 'required|numeric|exists:sessions,id',
        'equipment_id' => 'required|numeric|exists:equipment,id',
        'qty' => 'required|numeric',
    );

    protected $fillable = array(
        'session_id',  'equipment_id', 'qty'
    );

    public static $relationsData = array(
        'session' => array(self::BELONGS_TO, Session::class),
        'equipment' => array(self::BELONGS_TO, Equipment::class),
    );
}
