@extends('layouts.admin')
@section('content')
    <div style="background:  lightblue;">
        <div class="pb-3">
            <div class="card mt-3 ml-3 mr-3">
                <div class="card-header brand-color">

                    <div class="row">
                        <div class="col-xs-12 col-sm-7 col-md-8 mb-3 result-head">
                            <h3 class="card-title">Schedules for the week</h3><br>
                            <a href="{{ route('admin.schedulesPrint') }}" style="margin-left:450px;margin-top:-10px"
                                class="btn btn-primary btn-sm">Print</a>
                            {{-- <a style="margin-left:450px;margin-top:-10px" class="btn btn-primary btn-sm">Print</a> --}}
                        </div>

                        <!-- <div class="col-xs-12 col-sm-5 col-md-4 result-head">
                                                            <div id="example1_filter" class="dataTables_filter">
                                                                <label for=""><span class="search-txt"> Search: </span><input type="search"
                                                                        class="form-control control-form small-search" placeholder
                                                                        aria-controls="example1" style="width: 60% !important;">
                                                                </label>
                                                            </div>
                                                        </div> -->
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-body p-0">
                        <div>
                            <h1>Monday</h1>
                            {{-- <span style="margin-left:750px;margin-top:-110px" class="btn btn-primary">Print</span> --}}
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-head-fixed text-nowrap table-striped">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Deparment</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($mondaySchedules as $mondaySchedule)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $mondaySchedule->user->name }}</td>
                                                <td>{{ $mondaySchedule->user->department }}</td>
                                                <td>{{ $mondaySchedule->schedule_time }}</td>

                                            </tr>
                                        @empty
                                            <tr class="">
                                                <td colspan="4" class="text-center">No schedules for this day</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body p-0">
                        <div>
                            <h1>Tuesday</h1>
                            {{-- <span style="margin-left:750px;margin-top:-110px" class="btn btn-primary">Print</span> --}}
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-head-fixed text-nowrap table-striped">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Deparment</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($tuesdaySchedules as $tuesdaySchedule)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $tuesdaySchedule->user->name }}</td>
                                                <td>{{ $tuesdaySchedule->user->department }}</td>
                                                <td>{{ $tuesdaySchedule->schedule_time }}</td>

                                            </tr>
                                        @empty
                                            <tr class="">
                                                <td colspan="4" class="text-center">No schedules for this day</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body p-0">
                        <div>
                            <h1>Wednesday</h1>
                            {{-- <span style="margin-left:750px;margin-top:-110px" class="btn btn-primary">Print</span> --}}
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-head-fixed text-nowrap table-striped">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Deparment</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($wednesdaySchedules as $wednesdaySchedule)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $wednesdaySchedule->user->name }}</td>
                                                <td>{{ $wednesdaySchedule->user->department }}</td>
                                                <td>{{ $wednesdaySchedule->schedule_time }}</td>

                                            </tr>
                                        @empty
                                            <tr class="">
                                                <td colspan="4" class="text-center">No schedules for this day</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body p-0">
                        <div>
                            <h1>Thursday</h1>
                            {{-- <span style="margin-left:750px;margin-top:-110px" class="btn btn-primary">Print</span> --}}
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-head-fixed text-nowrap table-striped">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Deparment</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($thursdaySchedules as $thursdaySchedule)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $thursdaySchedule->user->name }}</td>
                                                <td>{{ $thursdaySchedule->user->department }}</td>
                                                <td>{{ $thursdaySchedule->schedule_time }}</td>

                                            </tr>
                                        @empty
                                            <tr class="">
                                                <td colspan="4" class="text-center">No schedules for this day</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <div class="card-body p-0">
                        <div>
                            <h1>Friday</h1>
                            {{-- <span style="margin-left:750px;margin-top:-110px" class="btn btn-primary">Print</span> --}}
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-head-fixed text-nowrap table-striped">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Deparment</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($fridaySchedules as $fridaySchedule)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $fridaySchedule->user->name }}</td>
                                                <td>{{ $fridaySchedule->user->department }}</td>
                                                <td>{{ $fridaySchedule->schedule_time }}</td>

                                            </tr>
                                        @empty
                                            <tr class="">
                                                <td colspan="4" class="text-center">No schedules for this day</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>



    </div>
@endsection
