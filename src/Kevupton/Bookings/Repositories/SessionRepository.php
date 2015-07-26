<?php namespace Kevupton\Bookings\Repositories;

use Kevupton\Bookings\Exceptions\SessionException;

class SessionRepository {
    /**
     * Attempts to retrieve a specific session, or throws a SessionException if the session does not exist.
     *
     * @param int $session_id the ID of the session to retrieve
     * @throws SessionException if the session with the specified ID doesn't exist.
     */
    public static function retrieve($session_id) {
        try {
            return Session::findOrFail($session_id);
        } catch(Exception $e) {
            throw new SessionException();
        }
    }
}