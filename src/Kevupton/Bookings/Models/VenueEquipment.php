<?php namespace Kevupton\Bookings\Models;

use Kevupton\BeastCore\BeastModel;

class VenueEquipment extends BeastModel {
    // table name
    protected $table = 'venue_equipment';
    public $timestamps = true;
    protected $primaryKey = array('venue_id', 'equipment_id');

    // validation rules
    public static $rules = array(
        'venue_id' => 'required|numeric|exists:venues,id',
        'equipment_id' => 'required|numeric|exists:equipment,id',
    );

    protected $fillable = array(
        'venue_id',  'equipment_id'
    );

    public static $relationsData = array(
        'venue' => array(self::BELONGS_TO, Venue::class),
        'equipment' => array(self::BELONGS_TO, Equipment::class),
    );
}
