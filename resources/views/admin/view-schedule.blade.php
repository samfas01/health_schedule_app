@extends('layouts.admin')
@section('content')
    <div class="card mt-5">


        <div class="card-header" style="font-weight: bold;font-size:21px">{{ __('Student Scheduled Date.') }}
        </div>



        <div class="col-md-8 offset-md-3">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-body">
                <form method="GET" action="{{ route('student.viewSchedule', $schedule->id) }}" style="margin-top:10px">
                    <div class="row mb-3">
                        <label for="name"
                            class="col-md-4 col-form-label text-md-end font-weight-bold">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            {{ $user->name }}

                        </div>
                    </div>

                    <div class="row mb-3 ">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-end font-weight-bold">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            {{ $user->email }}
                        </div>
                    </div>





                    <div class="row mb-3">
                        <label for="matric_no font-weight-bold"
                            class="col-md-4 col-form-label text-md-end font-weight-bold">{{ __('Date') }}</label>

                        <div class="col-md-6">
                            {{ \Carbon\Carbon::parse($schedule->schedule_time)->format('F j, Y') }}
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="matric_no"
                            class="col-md-4 col-form-label text-md-end font-weight-bold">{{ __('Time') }}</label>

                        <div class="col-md-6">
                            {{ \Carbon\Carbon::parse($schedule->schedule_time)->format('h:i A') }}
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="department"
                            class="col-md-4 col-form-label text-md-end font-weight-bold">{{ __('Department') }}</label>

                        <div class="col-md-6">
                            {{ $user->department }}
                        </div>
                    </div>



                    <div class="row mb-3">
                        <label for="department"
                            class="col-md-4 col-form-label text-md-end font-weight-bold">{{ __('Location') }}</label>

                        <div class="col-md-6">
                            {{ 'School Clinic' }}
                        </div>
                    </div>
                    <div class="row justify-content-around">
                        {{-- <a class="btn btn-primary col-sm-3 mt-1" href="{{ route('student.schedules') }}">Re-schedule</a> --}}
                        {{-- <button class="btn btn-primary col-sm-3 mt-1" data-bs-toggle="modal"
                            data-bs-target="#rescheduleModal">
                            Re-schedule
                        </button> --}}
                        @if ($schedule->is_canceled)
                            <button class="btn btn-danger col-sm-3 mt-1" type="button" disabled>Canceled</button>
                        @else
                            <button class="btn btn-info col-sm-3 mt-1" type="button" disabled>Active</button>
                        @endif
                        <a class="btn btn-success col-sm-3 mt-1"
                            href={{ route('admin.generateSchedulePdf', $schedule->id) }}>Print</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
