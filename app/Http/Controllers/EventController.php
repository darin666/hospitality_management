<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Calendar;
use \App\Reservation;                   
use \App\Apartment;                     
use Illuminate\Support\Facades\Auth;    
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Event;
use App\Task;

class EventController extends Controller
{
    public function index()
    {
        $apartments = Apartment::all();
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

    public function store(CreateEventRequest $request)
    {
        Event::create($request->all());

        $newReservation = new Reservation();
        $newReservation->apartment_id = $request->get('apartment_id');
        $newReservation->checkin_date = $request->get('start_date');
        $newReservation->checkout_date = $request->get('end_date');
        $newReservation->checkin_time = '09:00';
        $newReservation->checkout_time = '09:00';
        $newReservation->guest_name = $request->get('title');
        $newReservation->description = 'From calendar';
        $newReservation->addedBy_id = Auth::id();
        $newReservation->save();

        $newTask = new Task();
        $newTask->user_id = \Auth::id(); //Only Manager can create new reservations
        $newTask->name = 'Check '. $request->get('title'). ' in on ' . $request->get('start_date');
        $newTask->raisedBy_id = \Auth::id();
        $newTask->apartment_id = $request->get('apartment_id');
        $newTask->status_id = 0;
        $newTask->category_id = 0;
        $newTask->description = 'From calendar';
        $newTask->save();

        $newTask = new Task();
        $newTask->user_id = \Auth::id(); //Only Manager can create new reservations
        $newTask->name = 'Check '. $request->get('title'). ' out on ' . $request->get('end_date');
        $newTask->raisedBy_id = \Auth::id();
        $newTask->apartment_id = $request->get('apartment_id');
        $newTask->status_id = 0;
        $newTask->category_id = 0;
        $newTask->description = 'From calendar';
        $newTask->save();

//        t - new task()
//        t.setParams(params)
//        t = Task.createTask(params)

        $apartment = \App\Apartment::find($request->get('apartment_id'));

        $newTask = new Task();
        $newTask->user_id = \Auth::id(); //Only Manager can create new reservations
        $newTask->name = 'Clean apartment ' . $apartment->name;
        $newTask->raisedBy_id = \Auth::id();
        $newTask->apartment_id = $request->get('apartment_id');
        $newTask->status_id = 0;
        $newTask->category_id = 0;
        $newTask->description = 'From calendar';
        $newTask->save();

        return redirect('events');
    }

    public function update($id, UpdateEventRequest $request)
    {
        $event = Event::findOrFail($id);

        $event->update($request->all());

        return redirect('events');
    }
}
