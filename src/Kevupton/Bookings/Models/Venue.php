<?php namespace Kevupton\Bookings\Models;

use Kevupton\Ethereal\Models\Ethereal;
use Kevupton\Timetables\Timetable;

class Venue extends Ethereal {
    // table name
    protected $table = 'venues';
    public $timestamps = true;

    // validation rules
    public static $rules = array(
        'longitude' => 'required|numeric',
        'latitude' => 'required|numeric',
        'address' => 'required|string|max:150',
        'capacity' => 'required|numeric',
        'name' => 'string|max:255',
        'parent_venue_id' => 'exists:venues,id',
        'is_bookable' => 'required|boolean'
    );

    protected $fillable = array(
        'longitude', 'latitude', 'address', 'capacity', 'name', 'parent_venue_id', 'is_bookable'
    );

    public static $relationsData = array(
        'events' => array(self::HAS_MANY_THROUGH_CUSTOM, Event::class, Session::class, null, 'id', null, 'event_id'),
        'timetable' => array(self::MORPH_ONE,Timetable::class,'for')
    );

//    public function test() {
//        return $this->morphOne($related,$name, $type, $id, $localKey);
//    }
}
