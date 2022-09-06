@extends('layouts.admin.master')

@section('title') Register User @endsection

@section('content')

@component('components.breadcrumd')
@slot('li_1') Users @endslot
@slot('title') Details @endslot
@endcomponent

<div class="row">
    <div class="col-xl-12">
        <div class="card text-center">

            @foreach ($errors->all() as $message)
            <h3 class="text-danger">{{ $message }}</h3>
            @endforeach

            <div class="card-body">
                <h4 class="card-title mb-4">User Details</h4>
                <form action="{{ route('admin.register.user.update',$user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" placeholder="Name" readonly
                            value="{{ $user->name }}">
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input name="email" type="email" class="form-control" placeholder="Enter Your Email ID"
                                    readonly value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input name="phone" type="tel" class="form-control" placeholder="Enter Your Phone"
                                    readonly value="{{ $user->phone }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">CV Link</label>
                                <input name="cv_link" type="text" class="form-control" placeholder="Enter Your CV Link"
                                    readonly value="{{ $user->cv_link }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-inputState" class="form-label">Status</label>
                                <div class="form-check">
                                    <input name="status" class="form-check-input" type="checkbox" @if ($user->status ==
                                    1)
                                    checked @endif >
                                    <label class="form-check-label">Is Approved</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div>
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->

</div>
<!-- end row -->
@endsection
@section('script')

@endsection