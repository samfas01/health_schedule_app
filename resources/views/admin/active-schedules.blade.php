@extends('layouts.admin')
@section('content')
    <div class="content-wrapper ml-0" style="background:  lightblue;">
        <div class="pb-3">
            <div class="card mt-3 ml-3 mr-3">
                <div class="card-header brand-color">
                    <div class="row">
                        <div class="col-xs-12 col-sm-7 col-md-8 mb-3 result-head">
                            <h3 class="card-title">List Of Students</h3>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-head-fixed text-nowrap table-striped">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Deparment</th>
                                            <th>Appointment Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->department }}</td>
                                                <td>{{ $user->schedules->isEmpty() ? 'no schedue' : \Carbon\Carbon::parse($user->schedules[0]->schedule_time)->toDayDateTimeString() . '(' . \Carbon\Carbon::parse($user->schedules[0]->schedule_time)->diffForHumans() . ')' }}
                                                </td>
                                                <td>
                                                    @if (!$user->schedules->isEmpty())
                                                        <a class="btn btn-info btn-sm" href="{{route('admin.single_schedule',$user->schedules[0]->id)}}"
                                                            style="color:white">
                                                            <i class="fa fa-eye"></i>
                                                            {{ __('view') }}
                                                        </a>
                                                    @else
                                                        <button class="btn btn-info btn-sm" type="button" disabled
                                                            style="color:white">
                                                            <i class="fa fa-eye"></i>
                                                            {{ __('view') }}
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
@endsection
