<?php

use App\User;
use Illuminate\Database\Seeder;
use Kevupton\Bookings\Models\Category;
use Kevupton\Bookings\Models\Session;
use Kevupton\Timetables\Repositories\TimetableDayRepository;
use Kevupton\Timetables\Timetable;

class TestSeeds extends Seeder {
    public function run()
    {
        Category::create(array(
            'id' => 1,
            'category' => 'TestParent',
        ));
        Category::create(array(
            'id' => 2,
            'category' => 'TestChild',
            'parent_id' => 1
        ));

        User::insert(array(
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

        \Kevupton\Bookings\Models\Classification::insert(array(
            'code' => 'PG',
            'name' => 'Parental Guidance'
        ));

        $event = \Kevupton\Bookings\Models\Event::create(array(
            'name' => 'How',
            'category_id' => 2,
            'classification_code' => 'PG'
        ));

        $insert = \Kevupton\Bookings\Models\Venue::create(array(
            'name' => 'SmartVille',
            'is_bookable' => 1,
            'longitude' => 0,
            'latitude' => 0,
            'address' => 'Wowo',
            'capacity' => 100,
        ));

        $timetable = $insert->timetable()->create(array());
        foreach (TimetableDayRepository::daysOfWeek() as $day) {
            $$day = $timetable->days()->create(array(
                'day' => $day,
                'from' => '07:01:00',
                'to' => '09:01:01'
            ));
        }

        $MONDAY->to = '24:00:00.000000';
        $MONDAY->save();
        $TUESDAY->from = '00:00:00.000000';
        $TUESDAY->to = '24:00:00.000000';
        $TUESDAY->save();
        $WEDNESDAY->from = '00:00:00.000000';
        $WEDNESDAY->to = '24:00:00.000000';
        $WEDNESDAY->save();
        $THURSDAY->from = '00:00:00.000000';
        $THURSDAY->save();

        $timetable->specifics()->create(array(
            'is_available' => 1,
            'from' => '2017-02-01 09:01:01',
            'to' => '2017-03-01 09:01:01',
        ));

        Session::create(array(
            'event_id' => $event->id,
            'venue_id' => $insert->id,
            'duration' => 60,
            'timetable_id' => $timetable->id,
            'from' =>  '2017-02-01 09:01:01',
            'to' => '2017-03-01 09:01:01',
            'name' => 'pinokio'
        ));

        Session::create(array(
            'event_id' => $event->id,
            'venue_id' => $insert->id,
            'duration' => 120,
            'timetable_id' => $timetable->id,
            'from' =>  '2017-02-01 08:01:01',
            'to' => '2017-02-01 08:31:01',
            'name' => 'pinokio2'
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