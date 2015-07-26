<?php namespace Kevupton\Bookings\Repositories;

use Kevupton\Bookings\Exceptions\SessionException;
use Kevupton\Bookings\Models\Session;
use Kevupton\Bookings\Models\Ticket;

class TicketRepository {

    /**
     * Attempts to begin the ticket registration process by first securing a temporary ticket
     * which will be held for x minutes. If the booking process isn't completed within this time,
     * then the ticket will be lost.
     *
     * @param int $session_id the ID of the session that is attempting to register for.
     * @throws SessionException if the Session is not found.
     */
    public function beingTicketBooking($session_id) {
        $session = SessionRepository::retrieve($session_id);
    }
}