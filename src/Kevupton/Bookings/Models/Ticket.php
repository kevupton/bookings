<?php namespace Kevupton\Bookings\Models;

use Kevupton\BeastCore\BeastModel;

class Ticket extends BeastModel {
    // table name
    protected $table = 'tickets';
    public $timestamps = true;

    // validation rules
    public static $rules = array(
        'session_item_id' => 'required|numeric|exists:session_items,id',
        'user_id' => 'numeric|exists:user,id',
        'key' => 'string|max:64',
    );

    protected $fillable = array(
        'session_item_id',  'user_id', 'key'
    );

    public static $relationsData = array(
        'session_item' => array(self::BELONGS_TO),
        'user' => array(self::BELONGS_TO),
    );
}
