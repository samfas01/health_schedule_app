<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('user_type', '<>', 2)->with(['schedules' => function ($query) {
            $query->where([['is_canceled', false], ['is_fulfilled', false], ['schedule_time', '>', Carbon::now()]]);
        }])->get();
        // $users = DB::table('users')->distinct()->select('schedule_date', "email")->get();
        return view('admin.User', compact('users'));
    }
    public function activeSchedules()
    {
        $users = User::whereHas('schedules', function (Builder $query) {
            $query->where([['is_canceled', false], ['is_fulfilled', false], ['schedule_time', '>', Carbon::now()]]);
        })->with(['schedules' => function ($query) {
            $query->where([['is_canceled', false], ['is_fulfilled', false], ['schedule_time', '>', Carbon::now()]]);
        }])->get();
        // $users = DB::table('users')->distinct()->select('schedule_date', "email")->get();
        return view('admin.active-schedules', compact('users'));
        dd($users);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function viewSchedule($id)
    {
        $schedule = Schedule::where('id', $id)->with('user')->first();
        if (!$schedule) {
            return back()->with(['error_message' => 'Invalid Schedule!']);
        }
        // dd($schedule);
        $user =     $schedule->user;
        return view('admin.view-schedule', compact('schedule', 'user'));
    }
    public function generateSchedulePdf($id)

    {
        $schedule = Schedule::where('id', $id)->with('user')->first();
        if (!$schedule) {
            return back()->with(['error_message' => 'Invalid Schedule!']);
        }
        // dd($schedule);
        $user =     $schedule->user;

        $data = [
            'schedule' => $schedule,
            'user' => $user,
        ];
        // pdfview.blade.php
        $pdf = PDF::loadView('pdfview', $data);
        return $pdf->stream('student-medical-appointment-slip.pdf');

        // return $pdf->download('itsolutionstuff.pdf');
    }
    public function showDetails()
    {
        $today = Carbon::today();
        $monday = $today->startOfWeek();
        $tuesday = $monday->copy()->addDays(1);
        $wednesday = $monday->copy()->addDays(2);
        $thursday = $monday->copy()->addDays(3);
        $friday = $monday->copy()->addDays(4);
        $saturday = $monday->copy()->addDays(5);
        $schedules = Schedule::where([['is_canceled', false], ['schedule_time', '>', $monday], ['schedule_time', '<', $saturday]])->with('user')->get();
        $mondaySchedules = $schedules->where('schedule_time', '>', $monday)->where('schedule_time', '<', $tuesday);
        $tuesdaySchedules = $schedules->where('schedule_time', '>', $tuesday)->where('schedule_time', '<', $wednesday);
        $wednesdaySchedules = $schedules->where('schedule_time', '>', $wednesday)->where('schedule_time', '<', $thursday);
        $thursdaySchedules = $schedules->where('schedule_time', '>', $thursday)->where('schedule_time', '<', $friday);
        $fridaySchedules = $schedules->where('schedule_time', '>', $friday)->where('schedule_time', '<', $saturday);

        // dd($fridaySchedules);

        return view('admin.DateOfStudent', compact('mondaySchedules', 'tuesdaySchedules', 'wednesdaySchedules', 'thursdaySchedules', 'fridaySchedules'));
    }
    public function schedulesPrint()
    {
        $today = Carbon::today();
        $monday = $today->startOfWeek();
        $tuesday = $monday->copy()->addDays(1);
        $wednesday = $monday->copy()->addDays(2);
        $thursday = $monday->copy()->addDays(3);
        $friday = $monday->copy()->addDays(4);
        $saturday = $monday->copy()->addDays(5);
        $schedules = Schedule::where([['is_canceled', false], ['schedule_time', '>', $monday], ['schedule_time', '<', $saturday]])->with('user')->get();
        $mondaySchedules = $schedules->where('schedule_time', '>', $monday)->where('schedule_time', '<', $tuesday);
        $tuesdaySchedules = $schedules->where('schedule_time', '>', $tuesday)->where('schedule_time', '<', $wednesday);
        $wednesdaySchedules = $schedules->where('schedule_time', '>', $wednesday)->where('schedule_time', '<', $thursday);
        $thursdaySchedules = $schedules->where('schedule_time', '>', $thursday)->where('schedule_time', '<', $friday);
        $fridaySchedules = $schedules->where('schedule_time', '>', $friday)->where('schedule_time', '<', $saturday);

        // dd($fridaySchedules);
        $data = [
            'mondaySchedules' => $mondaySchedules,
            'tuesdaySchedules' => $tuesdaySchedules,
            'wednesdaySchedules' => $wednesdaySchedules,
            'thursdaySchedules' => $thursdaySchedules,
            'fridaySchedules' => $fridaySchedules,
        ];
        $pdf = PDF::loadView('admin.schedules-print', $data);
        // $output = $pdf->output();
        // return new Response($output, 200, [
        //     'Content-Type' => 'application/pdf',
        //     'Content-Disposition' =>  'inline; filename="invoice.pdf"',
        // ]);
        return $pdf->stream('student-week-schedules.pdf');
        return view('admin.schedules-print',  $data);
        return view('admin.schedules-print', compact('mondaySchedules', 'tuesdaySchedules', 'wednesdaySchedules', 'thursdaySchedules', 'fridaySchedules'));
    }



    public function printStudentDate($schedule_date)

    {
        // User::where('schedule_date ', '=',17)->get();

        // DB::table('students')->where('name', $userName)->first()


        $_17 = DB::table('users')->where('schedule_date', $schedule_date)->get();

        // pdfview.blade.php
        $pdf = PDF::loadView('admin.Student', compact('_17'));
        $output = $pdf->output();
        return new Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' =>  'inline; filename="invoice.pdf"',
        ]);
    }
}
