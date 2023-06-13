<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('assetss/css/all.min.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/owl.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/flaticon.css"> -->
    <link rel="stylesheet" href="{{ asset('assetss/css/jquery-ui.min.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/main.css"> -->
    <link rel="stylesheet" href="{{ asset('assetss/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetss/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetss/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetss/css/all.min.css') }}"> --}}
    <title>Week Schedule</title>
    {{-- <style>

        .brand-color {
            background-color: #343a40;
            color: #c2c7d0;
        }

        .card-title {
            font-size: 1.5rem !important;
        }

        .search-txt {
            font-size: 1.1rem;
            font-weight: 400;
        }

        .control-form {
            display: inline-block !important;
            width: 50% !important;
        }

        .card-header {
            padding-bottom: 0.5rem !important;
        }

        .card-title {
            font-size: 1.5rem !important;
        }

        .card {
            border: none !important;
        }

        .data-info {
            padding-top: .85em;
        }

        .page-link {
            color: #343a40 !important;
        }

        .page-item.active .page-link {
            background-color: #343a40 !important;
            border-color: #343a40 !important;
            color: #c2c7d0 !important;
        }

        .ul-pagination {
            margin: 2px 0;
            white-space: nowrap;
            justify-content: flex-end;
        }

        .btn-add {
            background: #fff;
            color: #343a40 !important;
            border-color: #343a40 !important;
        }

        .btn-add:hover {
            background: #343a40;
            color: #c2c7d0 !important;
        }

        .btn-outline-info.focus,
        .btn-outline-info:focus {
            box-shadow: 0 0 0 0 !important;
        }
    </style> --}}
</head>

<body>
    <div class="card mt-3 ml-3 mr-3">
        <div class="card-header brand-color">

            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-8 mb-3 result-head">
                    <h3 class="card-title">Schedules for the week</h3><br>
                </div>
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
</body>

</html>
