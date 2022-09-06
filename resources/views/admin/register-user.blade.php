@extends('layouts.admin.master')

@section('title') Register User @endsection

@section('content')

@component('components.breadcrumd')
@slot('li_1') Users @endslot
@slot('title') Data @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">All Users Data</h4>
                <p class="card-title-desc"></p>


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
                            <td class="d-flex">
                                <a href="{{ route('admin.register.user.edit',$user->id) }}"
                                    class="btn btn-primary waves-effect waves-light">
                                    <i class="bx bx-edit font-size-20 align-middle"></i>
                                </a>
                                <form action="{{ route('user.destroy',$user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-primary waves-effect waves-light" type="submit"><i
                                            class="bx bx-block font-size-20 align-middle"></i></button>
                                </form>
                                {{-- <a href="{{ route('admin.register.user.edit',$user->id) }}"
                                    class="btn btn-primary waves-effect waves-light">

                                </a> --}}
                                <a href="{{ route('user.details',$user->id) }}"
                                    class="btn btn-primary waves-effect waves-light">
                                    <i class="bx bxs-data font-size-20 align-middle"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center pt-3">
                                <h3>No data Found</h3>
                            </td>
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