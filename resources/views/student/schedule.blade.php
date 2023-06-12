@extends('layouts.user')
@section('page')
    <div class="card" style="height: 500px">
        <div class="row ">
            <div class="col-md-4 offset-md-2">
                <img style="border-radius: 100%; width: 100px;height:100px"
                    src="{{ asset('/profile_image/' . Auth::user()->photo) }}" style="width:150px;height:150px;">
            </div>

            <div class="col-md-6 mt-12">

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        {{ Auth::user()->name }}

                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        {{ Auth::user()->email }}
                    </div>
                </div>








                <div class="row mb-3">
                    <label for="matric_no" class="col-md-4 col-form-label text-md-end">{{ __('Date') }}</label>

                    <div class="col-md-6">
                        {{ \Carbon\Carbon::parse($schedule->schedule_time)->format('F j, Y') }}
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="matric_no" class="col-md-4 col-form-label text-md-end">{{ __('Time') }}</label>

                    <div class="col-md-6">
                        {{ \Carbon\Carbon::parse($schedule->schedule_time)->format('h:i A') }}
                    </div>
                </div>







                <div class="row mb-3">
                    <label for="department" class="col-md-4 col-form-label text-md-end">{{ __('Department') }}</label>

                    <div class="col-md-6">
                        {{ Auth::user()->department }}
                    </div>
                </div>


            </div>
            <div class="row justify-content-around">
                {{-- <a class="btn btn-primary col-sm-3 mt-1" href="{{ route('student.schedules') }}">Re-schedule</a> --}}
                <button class="btn btn-primary col-sm-3 mt-1" data-bs-toggle="modal" data-bs-target="#rescheduleModal">
                    Re-schedule
                </button>
                @if ($schedule->is_canceled)
                    <button class="btn btn-danger col-sm-3 mt-1" type="button" disabled>Canceled</button>
                @else
                    <a class="btn btn-danger col-sm-3 mt-1" href="{{ route('student.schedules') }}">Cancel</a>
                @endif
                <a class="btn btn-success col-sm-3 mt-1"
                    href={{ route('student.generateSchedulePdf', $schedule->id) }}>Print</a>
            </div>

        </div>


    </div>
    <div class="modal fade" id="rescheduleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="scheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="scheduleModalLabel">Re-Schedule</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($schedule->is_fulfilled || $schedule->is_canceled)
                        <div class="alert alert-danger">
                            You cannot reschedule a fulfiled or canceled schedule
                        </div>
                    @else
                        <form action="{{ route('student.schedules.reschedule', $schedule->id) }}" id="schedule-form"
                            method="post">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="schedule-email"
                                        value="{{ auth()->user()->email }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="schedule-time" class="col-sm-2 col-form-label">Date/Time</label>
                                <div class="col-sm-10">
                                    <input type="datetime-local" name="schedule-time" class="form-control"
                                        id="schedule-time">
                                    @error('schedule-time')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="text-center text-danger">
                                    <small>schedules are only on weekdays</small>
                                </div>
                            </div>
                            <div class="mb-3 row justify-content-center">
                                <button type="submit" class="btn btn-primary w-75">Re-schedule</button>
                            </div>
                            {{-- {{$nextMinSchedule}} --}}
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush
@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        console.log("{{ $nextMinSchedule }}")
        $("#schedule-time").flatpickr({
            defaultDate: "{{ $schedule->schedule_time }}",
            minDate: "{{ $nextMinSchedule }}",
            // minDate:"{{ $nextMinSchedule }}",
            enableTime: true,
            disable: [
                function(date) {
                    // return true to disable
                    return (date.getDay() === 0 || date.getDay() === 6);
                }
            ],
            "locale": {
                "firstDayOfWeek": 1 // start week on Monday
            }
        });
    </script>
@endpush
