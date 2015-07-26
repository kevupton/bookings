<?php namespace Kevupton\Bookings\Models;

use Illuminate\Database\Eloquent\Model;
use Kevupton\Bookings\Core\AdvModel;

class Equipment extends AdvModel {
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
        return $this->hasMany(SessionEquipment::class);
    }

    public function sessions() {
        return $this->hasManyThroughCustom(Session::class, SessionEquipment::class,null,'id',null,'session_id');
    }

}
