<?php namespace Kevupton\Bookings\Repositories;

use Kevupton\BeastCore\Repositories\BeastRepository;
use Kevupton\Bookings\Exceptions\CategoryException;
use Kevupton\Bookings\Models\Category;

class EquipmentRepository extends BeastRepository
{
    protected $exceptions = [
        'main' => CategoryException::class,
    ];

    /**
     * Retrieves the class instance of the specified repository.
     *
     * @return string the string instance of the defining class
     */
    function getClass()
    {
        return Category::class;
    }
}