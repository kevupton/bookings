<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TestSeeds extends Seeder {
    public function run()
    {
        \App\User::insert(array(
            'name' => 'joe',
            'email' => 'foo@bar.com',
            'password' => 'adasdas',
        ));

        \Kevupton\Bookings\Models\Equipment::insert(array(
            'name' => 'Chairs',
            'longitude' => 0,
            'latitude' => 0,
            'address' => 'yoyo',
            'qty' => 100
        ));

        \Kevupton\Bookings\Models\Venue::insert(array(
            'name' => 'SmartVille',
            'longitude' => 0,
            'latitude' => 0,
            'address' => 'Wowo',
            'capacity' => 100,
        ));

        \Kevupton\Bookings\Models\Event::insert(array(
            'name' => 'How'
        ));

        \Kevupton\Bookings\Models\Session::insert(array(
            array(
                'event_id' => 1,
                'venue_id' => 1,
                'duration' => 60,
                'datetime' => '2015-01-01',
                'name' => 'pinokio'
            ),
            array(
                'event_id' => 1,
                'venue_id' => 1,
                'duration' => 120,
                'datetime' => '2015-01-02',
                'name' => 'pinokio2'
            )
        ));

        \Kevupton\Bookings\Models\SessionEquipment::insert(array(
            array(
                'session_id' => 1,
                'equipment_id' => 1,
                'qty' => 10,
            ),
            array(
                'session_id' => 2,
                'equipment_id' => 1,
                'qty' => 50,
            )
        ));

        \Kevupton\Bookings\Models\SessionItem::insert(array(
            array(
                'session_id' => 1,
                'name' => "GOLD Ticket",
                'price' => 10000,
                'qty' => 100
            ),
            array(
                'session_id' => 2,
                'name' => "GOLD Ticket",
                'price' => 10000,
                'qty' => 100
            )
        ));

        \Kevupton\Bookings\Models\Ticket::insert(array(
            'session_item_id' => 1,
            'user_id' => 1,
        ));

        \Kevupton\Bookings\Models\VenueEquipment::insert(array(
            'venue_id' => 1,
            'equipment_id' => 1
        ));
    }
}