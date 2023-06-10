@extends('layouts.admin')
@section('content')
    <div style="background:  lightblue;">


        <!-- <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="addpost.php" class="btn btn-outline-info btn-block btn-add">
                                        <i class="fas fa-plus"></i> Add Post
                                    </a>
                                </div>
                            </div>
                        </div> -->
        <div class="pb-3">
            <div class="card mt-3 ml-3 mr-3">
                <div class="card-header brand-color">

                    <div class="row">
                        <div class="col-xs-12 col-sm-7 col-md-8 mb-3 result-head">
                            <h3 class="card-title">List Of Students</h3><br>
                            <span style="margin-left:450px;margin-top:-10px" class="btn btn-primary">Print</span>
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
                                        @foreach ($_17 as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->department }}</td>
                                                <td>{{ $user->schedule_date }}-01-2023</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                            <!-- <div class="col-sm-12 col-md-5">
                                                <div class="dataTables_info data-info">
                                                    Showing 1 to 10 of 5 entries
                                                </div>
                                            </div> -->

                        </div>
                    </div>
                </div>



                <div class="card-body "style="margin-top:100px">
                    <div class="card-body p-0">
                        <div>
                            <h1>Day 2</h1>
                            <span style="margin-left:750px;margin-top:-110px" class="btn btn-primary">Print</span>
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
                                        @foreach ($_19 as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->department }}</td>
                                                <td>{{ $user->schedule_date }}-01-2023</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                            <!-- <div class="col-sm-12 col-md-5">
                                                <div class="dataTables_info data-info">
                                                    Showing 1 to 10 of 5 entries
                                                </div>
                                            </div> -->

                        </div>
                    </div>
                </div>






                <div class="card-body "style="margin-top:100px">
                    <div class="card-body p-0">
                        <div>
                            <h1>Day 3</h1>
                            <span style="margin-left:750px;margin-top:-110px" class="btn btn-primary">Print</span>
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
                                        @foreach ($_19 as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->department }}</td>
                                                <td>{{ $user->schedule_date }}-01-2023</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                            <!-- <div class="col-sm-12 col-md-5">
                                                <div class="dataTables_info data-info">
                                                    Showing 1 to 10 of 5 entries
                                                </div>
                                            </div> -->

                        </div>
                    </div>
                </div>


                <div class="card-body "style="margin-top:100px">
                    <div class="card-body p-0">
                        <div>
                            <h1>Day 4</h1>
                            <span style="margin-left:750px;margin-top:-110px" class="btn btn-primary">Print</span>
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
                                        @foreach ($_20 as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->department }}</td>
                                                <td>{{ $user->schedule_date }}-01-2023</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                            <!-- <div class="col-sm-12 col-md-5">
                                                <div class="dataTables_info data-info">
                                                    Showing 1 to 10 of 5 entries
                                                </div>
                                            </div> -->

                        </div>
                    </div>
                </div>



                <div class="card-body "style="margin-top:100px">
                    <div class="card-body p-0">
                        <div>
                            <h1>Day 5</h1>
                            <span style="margin-left:750px;margin-top:-110px" class="btn btn-primary">Print</span>
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
                                        @foreach ($_20 as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->department }}</td>
                                                <td>{{ $user->schedule_date }}-01-2023</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                            <!-- <div class="col-sm-12 col-md-5">
                                                <div class="dataTables_info data-info">
                                                    Showing 1 to 10 of 5 entries
                                                </div>
                                            </div> -->

                        </div>
                    </div>
                </div>


                <div class="card-body "style="margin-top:100px">
                    <div class="card-body p-0">
                        <div>
                            <h1>Day 6</h1>
                            <span style="margin-left:750px;margin-top:-110px" class="btn btn-primary">Print</span>
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
                                        @foreach ($_20 as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->department }}</td>
                                                <td>{{ $user->schedule_date }}-01-2023</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                            <!-- <div class="col-sm-12 col-md-5">
                                                <div class="dataTables_info data-info">
                                                    Showing 1 to 10 of 5 entries
                                                </div>
                                            </div> -->

                        </div>
                    </div>
                </div>



            </div>
        </div>



    </div>
@endsection
