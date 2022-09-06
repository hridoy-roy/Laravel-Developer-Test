@extends('layouts.admin.master')

@section('title') Hello @endsection

@section('content')

@component('components.breadcrumd')
@slot('li_1') Admin @endslot
@slot('title') DashBoard @endslot
@endcomponent

<div class="row">

    <div class="col-xl-8">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">

                        <div class="d-flex flex-wrap">
                            <div class="me-3">
                                <p class="text-muted mb-2">Total Users</p>
                                <h5 class="mb-0">{{ $users }}</h5>
                            </div>

                            <div class="avatar-sm ms-auto">
                                <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                    <i class="bx bxs-book-bookmark"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- end row -->
    </div>
    <!-- end col -->

    <div class="col-xl-4">

    </div>
    <!-- end col -->

</div>

@endsection