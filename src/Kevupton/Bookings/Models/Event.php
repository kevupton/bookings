<?php namespace Kevupton\Bookings\Models;


use Kevupton\Ethereal\Models\Ethereal;

class Event extends Ethereal {
    // table name
    protected $table = 'events';

    // validation rules
    public static $rules = array(
        'name'                  => 'required|max:64',
        'classification_code'   => 'exists:classifications,code',
        'category_id'           => 'required|foreign_int:categories,id'
    );

    protected $fillable = array(
        'name', 'category_id', 'classification_code'
    );

    public static $relationsData = array(
        'sessions' => array(self::HAS_MANY, Session::class),
        'classification' => array(self::BELONGS_TO),
        'category' => array(self::BELONGS_TO)
    );
}
