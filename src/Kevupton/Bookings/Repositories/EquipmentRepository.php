<?php namespace Kevupton\Bookings\Repositories;


use Kevupton\Bookings\Exceptions\EquipmentException;
use Kevupton\Bookings\Models\Equipment;

class EquipmentRepository {

    /**
     * Attempts to retrieve the Equipment by the given equipment ID.
     *
     * @param int $equipment_id the id of the equipment
     * @return Equipment an instance of the Equipment class.
     * @throws EquipmentException if the equipment is not found
     */
    public static function retrieveEquipment($equipment_id) {
        try {
            return Equipment::findOrFail($equipment_id);
        } catch(\Exception $e) {
            throw new EquipmentException("Equipment $equipment_id not found");
        }
    }
}