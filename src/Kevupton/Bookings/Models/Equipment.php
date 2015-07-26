<?php namespace Kevupton\Bookings\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model {
    // table name
    protected $table = 'equipment';
    public $timestamps = true;

    // validation rules
    public static $rules = array(
        'name' => 'max:64'
    );
    // relationships
    public static $relationsData = array(
        'users' => array(self::BELONGS_TO_MANY, 'App\Models\User', 'table' => 'user_conversations'),
        'messages' => array(self::HAS_MANY, 'App\Models\Message'),
        'seenusers' => array(self::BELONGS_TO_MANY, 'App\Models\User', 'table' => 'seen_conversations')
    );

    protected $fillable = array(
        'name'
    );

}
