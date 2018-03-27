<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Calendar;
use \App\Reservation;                   // added
use \App\Apartment;                     // added
use Illuminate\Support\Facades\Auth;    // added
use App\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = [];
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
	                [
	                    'color' => '#f05050',
	                    'url' => '',
	                ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
        return view('calendar/fullcalendar', compact('calendar'));
    }
}
