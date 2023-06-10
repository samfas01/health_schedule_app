@extends('layouts.user')
@section('page')
    <div class="card">
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
                    <label for="department" class="col-md-4 col-form-label text-md-end">{{ __('Department') }}</label>

                    <div class="col-md-6">
                        {{ Auth::user()->department }}
                    </div>
                </div>


            </div>
            {{-- <div class="row justify-content-around">
                <a class="btn btn-primary col-sm-3 mt-1" href="{{ route('student.schedules') }}">My Schedules</a>
            </div> --}}
            <div class="col-12">
                <div class="card mt-3 ml-3 mr-3">
                    <div class="card-header brand-color">
                        <div class="row">
                            <div class="col-xs-12 result-head">
                                <div class="row justify-content-between">
                                    <div class="col-sm-9">
                                        <h3 class="card-title d-inline-block">Your Schedules</h3>
                                    </div>
                                    <div class="col-sm-3 pull-right">
                                        <button class="btn btn-primary w-100 text-right" data-bs-toggle="modal"
                                            data-bs-target="#scheduleModal">
                                            + Create Schedule
                                        </button>
                                    </div>
                                </div>

                            </div>
                            {{-- <div class="col-xs-12 col-sm-5 col-md-4 result-head">
                                <div id="example1_filter" class="dataTables_filter">
                                    <label for=""><span class="search-txt"> Search: </span><input type="search"
                                            class="form-control control-form small-search" placeholder
                                            aria-controls="example1" style="width: 60% !important;">
                                    </label>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-head-fixed text-nowrap table-striped">
                                        {{-- <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Name</th>
                                                <th>Deparment</th>
                                                <th>Appointment Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead> --}}
                                        <tbody>
                                            @foreach ($schedules as $schedule)
                                                <tr>
                                                    <td>{{ $schedule->id }}</td>
                                                    <td>
                                                        {{ \Carbon\Carbon::parse($schedule->schedule_time)->toDayDateTimeString() }}
                                                    </td>
                                                    <td>
                                                        {{ \Carbon\Carbon::parse($schedule->schedule_time)->diffForHumans() }}
                                                    </td>
                                                    <td>
                                                        @if ($schedule->is_canceled)
                                                            <span class="badge rounded-pill text-bg-danger">Canceled</span>
                                                        @elseif (!$schedule->is_fulfilled)
                                                            <span
                                                                class="badge rounded-pill text-bg-secondary">Pending...</span>
                                                        @elseif ($schedule->is_fulfilled)
                                                            <span
                                                                class="badge rounded-pill text-bg-success">Fulfilled</span>
                                                        @else
                                                            <span class="badge rounded-pill text-bg-dark">
                                                                Status Unknown
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>

                                                        <a href="{{ route('student.viewSchedule', $schedule->id) }}"
                                                            class="btn btn-primary btn-sm" type="button"
                                                            style="color:white">
                                                            <i class="fa fa-eye"></i> {{ __('Re-Schedule') }}
                                                        </a>
                                                    </td>
                                                    <td>

                                                        <a href="{{ route('student.viewSchedule', $schedule->id) }}"
                                                            class="btn btn-primary btn-sm" type="button"
                                                            style="color:white">
                                                            <i class="fa fa-eye"></i> {{ __('view') }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        @if (!$schedule->is_canceled)
                                                            @if ($schedule->is_fulfiled)
                                                                <button class="btn btn-danger btn-sm" type="button"
                                                                    disabled style="color:white">
                                                                    x {{ __('cancel') }}
                                                                </button>
                                                            @else
                                                                <form
                                                                    action="{{ route('student.schedules.cancel', $schedule->id) }}"
                                                                    method="post">
                                                                    @method('PATCH')
                                                                    @csrf
                                                                    <button class="btn btn-danger btn-sm" type="submit"
                                                                        style="color:white">
                                                                        x {{ __('Cancel') }}
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        @else
                                                            <button class="btn btn-danger btn-sm" type="button" disabled
                                                                style="color:white">
                                                                x {{ __('canceled') }}
                                                            </button>
                                                        @endif
                                                    </td>

                                                </tr>
                                            @endforeach



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>


    <!-- Modal -->
    <div class="modal fade" id="scheduleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="scheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="scheduleModalLabel">Create New Schedule</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (!$activeSchedule->isEmpty())
                        <div class="alert alert-danger">
                            You already have an active schedule! you can only create new schedule when previous schedules
                            are fulfiled or canceled
                        </div>
                    @else
                        <form action="{{ route('student.schedules') }}" id="schedule-form" method="post">
                            @csrf
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
                                <button type="submit" class="btn btn-primary w-75">Create</button>
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
