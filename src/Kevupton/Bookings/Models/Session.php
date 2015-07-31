<?php namespace Kevupton\Bookings\Models;

use Kevupton\BeastCore\BeastModel;

class Session extends BeastModel {
    // table name
    protected $table = 'sessions';
    public $timestamps = true;

    // validation rules
    public static $rules = array(
        'event_id' => 'required|numeric|exists:events,id',
        'venue_id' => 'required|numeric|exists:venues,id',
        'duration' => 'required|numeric',
        'datetime' => 'required|date',
        'name' => 'required|string|max:255',
    );

    protected $fillable = array(
        'event_id', 'venue_id', 'duration', 'datetime', 'name'
    );

    public static $relationsData = array(
        'session_equipment' => array(self::HAS_MANY, SessionEquipment::class),
        'session_items' => array(self::HAS_MANY, SessionItem::class),
    );
}
