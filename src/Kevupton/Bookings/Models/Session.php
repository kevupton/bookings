<?php namespace Kevupton\Bookings\Models;

use Kevupton\BeastCore\MorphModel;
use Kevupton\Timetables\TimetableBooking;

class Session extends MorphModel {
    // table name
    protected $table = 'sessions';
    public $timestamps = true;

    protected $morphBy = 'for';
    protected $morphTable = 'timetable_bookings';
    protected $morphModel = TimetableBooking::class;

    // validation rules
    public static $rules = array(
        'event_id' => 'required|numeric|exists:events,id',
        'venue_id' => 'required|numeric|exists:venues,id',
        'duration' => 'required|numeric',
        'name' => 'required|string|max:255',
    );

    protected $fillable = array(
        'event_id', 'venue_id', 'duration', 'name'
    );

    public static $relationsData = array(
        'session_equipment' => array(self::HAS_MANY, SessionEquipment::class),
        'session_items' => array(self::HAS_MANY, SessionItem::class),
    );
}
