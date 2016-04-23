<?php namespace Kevupton\Bookings\Repositories;

use Kevupton\Bookings\Exceptions\SessionException;
use Kevupton\Bookings\Exceptions\TicketException;
use Kevupton\Bookings\Exceptions\TemporaryTicketException;
use Kevupton\Bookings\Models\Ticket;
use Kevupton\Ethereal\Repositories\Repository;

class TicketRepository extends Repository {
    const TICKETING_HOLDING_TIME = 15;

    protected $exceptions = [
        'main' => TicketException::class,
        'temp' => TemporaryTicketException::class
    ];

    /**
     * Attempts to begin the ticket registration process by first securing a temporary ticket
     * which will be held for x minutes. If the booking process isn't completed within this time,
     * then the ticket will be lost.
     *
     * @param int $session_id the ID of the session that is attempting to register for.
     * @throws SessionException if the Session is not found.
     */
    public function beginTicketBooking($session_id) {
        $session = SessionRepository::retrieve($session_id);
        $ticket = $this->retrieveByID(1);
        dd($ticket->sessions);
    }

    /**
     * Retrieves the class instance of the specified repository.
     *
     * @return string the string instance of the defining class
     */
    function getClass()
    {
        return Ticket::class;
    }
}