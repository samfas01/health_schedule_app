@extends('layouts.user')
@section('page')
    <div class="col-md-12">
        <div class="content-wrapper" style="background:  lightblue;">
            <div class="pb-3">
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
