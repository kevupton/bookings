<?php namespace Kevupton\Bookings\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Kevupton\BeastCore\Repositories\BeastRepository;
use Kevupton\Bookings\Exceptions\EventException;
use Kevupton\Bookings\Models\Event;

class EventRepository extends BeastRepository {
    protected $exceptions = [
        'main' => EventException::class,
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

    /**
     * Gets the latest events. Default to 9.
     *
     * @param int $count default 9. the number of events to retrieve
     * @return Collection the collection of events retrieved.
     */
    public function getLatestEvents($count = 9) {
        return Event::query()->orderBy('created_at','desc')->take($count)->get();
    }
}