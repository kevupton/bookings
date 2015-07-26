<?php namespace Kevupton\Bookings\Models;

use Illuminate\Database\Eloquent\Model;

class SessionEquipment extends Model {
    // table name
    protected $table = 'session_equipment';
    public $timestamps = true;

    // validation rules
    public static $rules = array(
        'session_id' => 'required|max:64',
        'equipment_id' => 'required|numeric',
        'qty' => 'required|numeric',
    );

    protected $fillable = array(
        'session_id',  'equipment_id', 'qty'
    );

    public function session_equipment() {
        return $this->belongsToMany(SessionEquipment::class, 'session_equipment');
    }

    public function sessions() {
        return $this->hasManyThrough(Session::class, SessionEquipment::class,'a','b','c');
    }

}
