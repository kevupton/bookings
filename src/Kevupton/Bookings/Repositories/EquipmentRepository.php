<?php namespace Kevupton\Bookings\Repositories;


use Kevupton\Bookings\Exceptions\EquipmentException;
use Kevupton\Bookings\Models\Equipment;
use Kevupton\Ethereal\Repositories\Repository;

class EquipmentRepository extends Repository {
    protected $exceptions = [
        'main' => EquipmentException::class,
    ];

    /**
     * Retrieves the class instance of the specified repository.
     *
     * @return string the string instance of the defining class
     */
    function getClass()
    {
        return Equipment::class;
    }
}