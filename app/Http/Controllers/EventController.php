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
        $apartments = \App\Apartment::all();
        $events = [];
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $event) {
                $events[] = Calendar::event(
                    $event->title . ' (' . ($event->apartment !== null ? $event->apartment->name : 'N/A') . ')',
                    true,
                    new \DateTime($event->start_date),
                    new \DateTime($event->end_date.' +1 day'),
                    null,
                    // Add color and link on event
	                [
	                    'color' => '#f05050',
                        'url' => '',
                        'data' => [
                            'apartment_id' => $event->apartment_id,
                            'id' => $event->id,
                            'start_date' => $event->start_date,
                            'end_date' => $event->end_date,
                            'title' => $event->title,
                        ],
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events)->setOptions([ //set fullcalendar options
            'firstDay' => 1
        ])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
            'dayClick' => 'function() {
                $("#create_start_date").val($(this).data("date"));
                $("#create_end_date").val($(this).data("date"));
                $("#CreateModal").modal().show();
            }',
            'eventClick' => 'function() {
                var form = $("#update_title").parents("form");
                $(form).attr("action", $(form).attr("action") + $(this).data("fcSeg").event.data.id);
                $("#update_start_date").val($(this).data("fcSeg").event.data.start_date);
                $("#update_end_date").val($(this).data("fcSeg").event.data.end_date);
                $("#update_apartment_id").val($(this).data("fcSeg").event.data.apartment_id);
                $("#update_title").val($(this).data("fcSeg").event.data.title);

                $("#UpdateModal").modal().show();
            }',

        ]);;
        return view('calendar/fullcalendar', compact('calendar','apartments'));
    }

    public function store(Request $request)
    {
        Event::create($request->all());

        return redirect('events');
    }

    public function update($id, Request $request)
    {
        $event = Event::findOrFail($id);

        $event->update($request->all());

        return redirect('events');
    }
}
