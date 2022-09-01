@extends('layouts.admin.master')

@section('title') Register User @endsection

@section('content')

@component('components.breadcrumd')
@slot('li_1') Users @endslot
@slot('title') Data Tables @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Default Datatable</h4>
                <p class="card-title-desc">DataTables has most features enabled by
                    default, so all you need to do to use it with your own tables is to call
                    the construction function: <code>$().DataTable();</code>.
                </p>


                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Emial</th>
                            <th>Phone </th>
                            <th>Status</th>
                            <th class="w-25">Action</th>
                        </tr>
                    </thead>


                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->status ? 'Approved': 'Rejected' }}</td>
                            <td>
                                <a href="{{ route('admin.register.user.edit',$user->id) }}"
                                    class="btn btn-primary waves-effect waves-light">
                                    <i class="bx bx-smile font-size-16 align-middle"></i>
                                </a>
                                <button type="button" class="btn btn-primary waves-effect waves-light">
                                    <i class="bx bx-smile font-size-16 align-middle"></i>
                                </button>
                                <a href="" class="btn btn-primary waves-effect waves-light">
                                    <i class="bx bx-smile font-size-16 align-middle"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection
@section('script')
<!-- Required datatable js -->
<script src="{{ asset('assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<!-- Datatable init js -->
<script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
@endsection