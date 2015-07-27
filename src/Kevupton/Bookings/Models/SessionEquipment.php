<?php namespace Kevupton\Bookings\Models;

use Kevupton\BeastCore\BeastModel;

class SessionEquipment extends BeastModel {
    // table name
    protected $table = 'session_equipment';
    public $timestamps = true;

    // validation rules
    public static $rules = array(
        'session_id' => 'required|numeric|references:sessions,id',
        'equipment_id' => 'required|numeric',
        'qty' => 'required|numeric',
    );

    protected $fillable = array(
        'session_id',  'equipment_id', 'qty'
    );

    public static $relationsData = array(
        'sessions' => array(self::BELONGS_TO),
        'equipment' => array(self::BELONGS_TO),
    );
}
