<?php namespace Kevupton\Bookings\Models;


use Kevupton\Ethereal\Models\Ethereal;

class Ticket extends Ethereal {
    // table name
    protected $table = 'tickets';
    public $timestamps = true;

    // validation rules
    public static $rules = array(
        'session_item_id' => 'required|numeric|exists:session_items,id',
        'user_id' => 'numeric|exists:user,id'
    );

    protected $fillable = array(
        'session_item_id',  'user_id'
    );

    public static $relationsData = array(
        'session_item' => array(self::BELONGS_TO, SessionItem::class, 'session_item_id', 'id', 'session_items'),
        'user' => array(self::BELONGS_TO, 'user class'),
    );

    public function __construct() {
        $data = self::$relationsData['user'];
        $data[1] = \Config::get('auth.model');
        self::$relationsData['user'] = $data;
    }
}
