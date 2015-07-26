<?php namespace Kevupton\Bookings\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model {
    // table name
    protected $table = 'equipment';
    public $timestamps = true;

    // validation rules
    public static $rules = array(
        'name' => 'required|max:64',
        'longitude' => 'required|numeric',
        'latitude' => 'required|numeric',
        'address' => 'required|max:150',
        'qty' => 'numeric|required'
    );

    protected $fillable = array(
        'name',  'longitude', 'latitude', 'address', 'qty'
    );

    public function session_equipment() {
        return $this->belongsToMany('session_equipment');
    }

    public function sessions() {
        return $this->hasManyThrough('sessions', 'session_equipment');
    }

}
