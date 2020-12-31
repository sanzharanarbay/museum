<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class EventController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:events-list|events-create|events-edit|events-delete', ['only' => ['index','store']]);
        $this->middleware('permission:events-create', ['only' => ['create','store']]);
        $this->middleware('permission:events-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:events-delete', ['only' => ['destroy']]);
    }

    public function index(){
        $events = Event::with('user')->paginate(10);
        return view('modules.admin.pages.events.index', compact('events'));
    }


    public function show($id){
        $event = Event::with('user')->findOrFail($id);
        return view('modules.admin.pages.events.show', compact('event'));
    }

    public function create(){
        return view('modules.admin.pages.events.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'start_date' => 'required|before_or_equal:end_date',
            'end_date' => 'required|after_or_equal:start_date',
            'partner_name' => 'nullable',
            'image'=>'required|mimes:jpeg,jpg,png,gif,svg|max:20480',
        ]);
        $start_date = \DateTime::createFromFormat('Y-m-d', $request->start_date);
        $end_date = \DateTime::createFromFormat('Y-m-d', $request->end_date);
        $event = new Event();
        $event->name = $request->name;
        $event->description = $request->description;
        $event->start_date = $start_date;
        $event->end_date = $end_date;
        $event->created_by = Auth::id();
        $event->partner_name = $request->partner_name;
        if(!file_exists('uploads/events')){
            mkdir('uploads/events', 0777, true);
        }
        $image = $request->image;
        $randomString = uniqid();
        $filepath = 'uploads/events/';
        $fileName = $randomString .$image->getClientOriginalName();
        $image->move($filepath, $fileName);
        $event->image_path = $filepath . $fileName;
        $event->unique_id = self::generateEventID();
        if(!file_exists('uploads/qr')){
            mkdir('uploads/qr', 0777, true);
        }
        $event->save();
        return redirect()->route('events.index')
            ->with('success','Event created successfully');
    }

    public function edit($id){
        $event = Event::with('user')->findOrFail($id);
        $start_date = Carbon::parse($event->start_date)->format('Y-m-d');
        $end_date = Carbon::parse($event->end_date)->format('Y-m-d');
        return view('modules.admin.pages.events.edit', compact('event','start_date','end_date'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'start_date' => 'required|before_or_equal:end_date',
            'end_date' => 'required|after_or_equal:start_date',
            'partner_name' => 'nullable',
            'image'=>'mimes:jpeg,jpg,png,gif,svg|max:20480',
        ]);
        $start_date = \DateTime::createFromFormat('Y-m-d', $request->start_date);
        $end_date = \DateTime::createFromFormat('Y-m-d', $request->end_date);
        $event = Event::findOrFail($id);
        $event->name = $request->name;
        $event->description = $request->description;
        $event->start_date = $start_date;
        $event->end_date = $end_date;
        $event->created_by = Auth::id();
        $event->partner_name = $request->partner_name;
        if(!file_exists('uploads/events')){
            mkdir('uploads/events', 0777, true);
        }
        $image = $request->image;
        if($image){
            unlink($event->image_path);
            if(!file_exists('uploads/events')){
                mkdir('uploads/events', 0777, true);
            }
            $randomString = uniqid();
            $filepath = 'uploads/events/';
            $fileName = $randomString .$image->getClientOriginalName();
            $image->move($filepath, $fileName);
            $event->image_path = $filepath . $fileName;
        }
        $event->update();
        return redirect()->route('events.index')
            ->with('success','Event updated successfully');
    }

    public function destroy($id){
        $event = Event::findOrFail($id);
        unlink($event->image_path);
        $event->delete();
        return redirect()->route('events.index')
            ->with('success','Event deleted successfully');
    }

    // Function for generating notification ID
    public static function generateEventID()
    {
        $notification_id = mt_rand(1, 9);
        while (strlen($notification_id) < 12)
            $notification_id .= mt_rand(0, 9);

        return $notification_id;
    }


}
