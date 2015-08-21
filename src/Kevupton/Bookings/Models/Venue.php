<?php namespace Kevupton\Bookings\Models;

use Kevupton\BeastCore\BeastModel;

class Venue extends BeastModel {
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
    );
}
