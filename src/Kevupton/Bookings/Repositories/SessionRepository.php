<?php namespace Kevupton\Bookings\Repositories;

use Kevupton\Bookings\Exceptions\SessionException;
use Kevupton\Bookings\Models\Session;
use Kevupton\Ethereal\Repositories\Repository;

class SessionRepository extends Repository {
    protected $exceptions = [
        'main' => SessionException::class,
    ];

    /**
     * Retrieves the class instance of the specified repository.
     *
     * @return string the string instance of the defining class
     */
    function getClass()
    {
        return Session::class;
    }
}