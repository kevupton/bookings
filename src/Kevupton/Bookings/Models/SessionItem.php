<?php namespace Kevupton\Bookings\Models;

use Kevupton\BeastCore\BeastModel;

class SessionItem extends BeastModel {
    // table name
    protected $table = 'session_items';
    public $timestamps = true;

    // validation rules
    public static $rules = array(
        'session_id' => 'required|numeric|references:sessions,id',
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'qty' => 'required|numeric',
    );

    protected $fillable = array(
        'session_id', 'name', 'price', 'qty'
    );

    public static $relationsData = array(
        'session' => array(self::BELONGS_TO, Session::class),
        'tickets' => array(self::HAS_MANY, Ticket::class),
    );
}
