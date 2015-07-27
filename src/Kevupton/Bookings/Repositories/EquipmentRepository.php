<?php namespace Kevupton\Bookings\Repositories;


use Kevupton\BeastCore\Repository\BeastRepository;
use Kevupton\Bookings\Exceptions\EquipmentException;
use Kevupton\Bookings\Models\Equipment;

class EquipmentRepository extends BeastRepository {
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