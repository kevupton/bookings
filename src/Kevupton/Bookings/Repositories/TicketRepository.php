<?php namespace Kevupton\Bookings\Repositories;

use Kevupton\Bookings\Exceptions\SessionException;
use Kevupton\Bookings\Exceptions\TicketException;
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
    public static function beingTicketBooking($session_id) {
        $session = SessionRepository::retrieve($session_id);
        $ticket = self::retrieveTicket(1);
        dd($ticket->sessions);
    }

    /**
     * Attempts to retrieve the Ticket by the given ticket ID.
     *
     * @param int $ticket_id the id of the ticket
     * @return Ticket an instance of the Ticket class.
     * @throws TicketException if the ticket is not found
     */
    public static function retrieveTicket($ticket_id) {
        try {
            return Ticket::findOrFail($ticket_id);
        } catch(\Exception $e) {
            throw new TicketException("Ticket $ticket_id not found");
        }
    }
}