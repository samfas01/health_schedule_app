@extends('layouts.user')
@section('page')
    <div class="row justify-content-center">
        <div class="card">


            <div class="card-header" style="font-weight: bold;font-size:21px">{{ __('Student Scheduled Date.') }}</div>



            {{-- <div class="col-md-8 offset-md-3">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-body">
                    <p>kindly bring along the hard copy to the health center.</p>
                    <form method="GET" action="{{ route('generatePDF') }}" style="margin-top:10px">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                {{ Auth::user()->name }}

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                {{ Auth::user()->email }}
                            </div>
                        </div>







                        <div class="row mb-3">
                            <label for="matric_no" class="col-md-4 col-form-label text-md-end">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                {{ \Carbon\Carbon::parse(Auth::user()->schedule_date)->toDateString() }}
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="matric_no" class="col-md-4 col-form-label text-md-end">{{ __('Time') }}</label>

                            <div class="col-md-6">
                                {{ \Carbon\Carbon::parse(Auth::user()->schedule_date)->format('g:i a') }}
                            </div>
                        </div>







                        <div class="row mb-3">
                            <label for="department"
                                class="col-md-4 col-form-label text-md-end">{{ __('Department') }}</label>

                            <div class="col-md-6">
                                {{ Auth::user()->department }}
                            </div>
                        </div>




                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('print') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}

        </div>
    </div>
@endsection
