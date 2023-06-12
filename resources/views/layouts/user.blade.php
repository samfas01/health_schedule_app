@extends('layouts.site')
@section('content')
    <div class="container" style="padding-top: 120px;">
        @if (session('error_message'))
            <div class="alert alert-danger">
                {{ session('error_message') }}
            </div>
        @endif
        @if (session('message'))
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
        @endif
        @yield('page')
    </div>
    <!-- Modal -->
    @if ($activeSchedule)
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
                                You already have an active schedule! you can only create new schedule when previous
                                schedules
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
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
