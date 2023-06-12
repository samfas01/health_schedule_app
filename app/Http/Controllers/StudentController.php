<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth',]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $user =     auth()->user();
        $schedules = $user->schedules;
        $activeSchedule = $user->schedules()->where([['is_canceled', false], ['is_fulfilled', false], ['schedule_time', '>', Carbon::now()]])->get();
        $nextMinSchedule = Carbon::today()->addWeekday()->addHours(8);
        // $nextMaxSchedule = $nextMinSchedule->addWeekdays(7);
        // dd($nextMinSchedule);
        return view('student.home', compact('schedules', 'nextMinSchedule', 'activeSchedule'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function schedules()
    {
        $user =     auth()->user();
        $schedules = $user->schedules;
        $activeSchedule = $schedules->where('is_fulfilled', false)->where('is_canceled', false);
        // dd($activeSchedule);
        $nextMinSchedule = Carbon::today()->addWeekday()->addHours(8);
        // $nextMaxSchedule = $nextMinSchedule->addWeekdays(7);
        // dd($nextMinSchedule);
        return view('student.schedules', compact('schedules', 'nextMinSchedule', 'activeSchedule'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function createSchedule(Request $request)
    {
        $request->validate([
            "schedule-time" => 'required|date_format:Y-m-d H:i',
        ]);
        $user = auth()->user();
        $activeSchedules = $user->schedules()->where([['is_canceled', false], ['is_fulfilled', false], ['schedule_time', '>', Carbon::now()]])->get();
        if (!$activeSchedules->isEmpty()) {
            return redirect()->back()->with(['error_message' => 'You already have an active schedule!']);
            dd('$activeSchedules->isEmpty()');
        }
        // dd($activeSchedules);

        $user->schedules()->create([
            'schedule_time' => $request["schedule-time"],
        ]);
        return redirect()->route('student.schedules')->with(['message' => 'Successfully created new task!']);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cancelSchedule(Request $request, $id)
    {
        $schedule = auth()->user()->schedules()->find($id);
        if ($schedule) {
            $schedule->is_canceled = true;
            $schedule->save();
        }
        return back()->with(['message' => 'Successfully canceled schedule!']);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function reSchedule(Request $request, $id)
    {
        $request->validate([
            "schedule-time" => 'required|date_format:Y-m-d H:i',
        ]);
        $user = auth()->user();
        // $activeSchedules = $user->schedules()->where([['is_canceled', false], ['is_fulfilled', false], ['schedule_time', '>', Carbon::now()]])->get();
        // if (!$activeSchedules->isEmpty()) {
        //     return redirect()->back()->with(['error_message' => 'You already have an active schedule!']);
        //     dd('$activeSchedules->isEmpty()');
        // }
        $schedule = $user->schedules()->find($id);
        if (!$schedule || $schedule->is_canceled || $schedule->is_fulfilled) {
            return redirect()->back()->with(['error_message' => 'Schedule invalid or already canceled']);
            dd('$activeSchedules->isEmpty()');
        }
        $schedule->schedule_time = $request["schedule-time"];
        $schedule->is_fulfilled = false;
        $schedule->is_canceled = false;
        $schedule->save();
        return back()->with(['message' => 'Successfully rescheduled schedule!']);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function viewSchedule($id)
    {
        $user =     auth()->user();
        $schedule = $user->schedules()->find($id);
        if (!$schedule) {
            return back()->with(['error_message' => 'Invalid Schedule!']);
        }
        $activeSchedule = $user->schedules->where('is_fulfilled', false)->where('is_canceled', false);
        // dd($activeSchedule);
        $nextMinSchedule = Carbon::today()->addWeekday()->addHours(8);
        return view('student.schedule', compact('schedule', 'nextMinSchedule', 'activeSchedule'));
    }

    public function generateSchedulePdf($id)

    {
        $user = auth()->user();

        $schedule = $user->schedules()->where([['is_canceled', false], ['id', $id], ['is_fulfilled', false], ['schedule_time', '>', Carbon::now()]])->first();
        if (!$schedule) {
            return redirect()->back()->with(['error_message' => 'Invalid Schedule!']);
            dd('$activeSchedules->isEmpty()');
        }

        $data = [

            'schedule' => $schedule,
            'user' => $user,

        ];
        // pdfview.blade.php
        $pdf = PDF::loadView('pdfview', $data);
        return $pdf->stream('student-medical-appointment-slip.pdf');

        // return $pdf->download('itsolutionstuff.pdf');
    }
}
