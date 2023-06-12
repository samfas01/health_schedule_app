@extends('layouts.user')
@section('page')
    <div class="card py-5">
        <div class="row ">
            <div class="col-md-4 offset-md-1">
                <img style="border-radius: 100%; width: 100px;height:100px"
                    src="{{ asset('/profile_image/' . Auth::user()->photo) }}" style="width:150px;height:150px;">
            </div>

            <div class="col-md-7 mt-12">

                <div class="row mb-3">
                    <div class="col-md-4 col-form-label text-md-endx">{{ __('Name') }}</div>

                    <div class="col-md-6">
                        {{ Auth::user()->name }}

                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 col-form-label text-md-endx">{{ __('Email Address') }}</div>

                    <div class="col-md-6">
                        {{ Auth::user()->email }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 col-form-div text-md-endx">{{ __('Department') }}</div>

                    <div class="col-md-6">
                        {{ Auth::user()->department }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 col-form-div text-md-endx">{{ __('Next Schedule') }}</div>

                    <div class="col-md-6">
                        {{ $activeSchedule->isEmpty() ? 'no pending schedue' : \Carbon\Carbon::parse($activeSchedule[0]->schedule_time)->toDayDateTimeString() . '(' . \Carbon\Carbon::parse($activeSchedule[0]->schedule_time)->diffForHumans() . ')' }}
                    </div>
                </div>


            </div>
            <div class="row justify-content-around">
                <a class="btn btn-primary col-sm-3 mt-1" href="{{ route('student.schedules') }}">My Schedules</a>
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
            defaultDate: "{{ $nextMinSchedule }}",
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
