<?php namespace Kevupton\Bookings\Repositories;

use Kevupton\BeastCore\Repositories\BeastRepository;
use Kevupton\Bookings\Exceptions\SessionException;
use Kevupton\Bookings\Models\Session;

class SessionRepository extends BeastRepository {
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