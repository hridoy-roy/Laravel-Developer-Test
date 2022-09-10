@extends('layouts.admin.master')

@section('title') Quiz @endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/toastr/toastr.min.css') }}">

<!-- DataTables -->
<link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Edit QUESTION SECTION</h4>
                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <livewire:question-create model:>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<!-- toastr plugin -->
<script src="{{ asset('assets/libs/toastr/toastr.min.js') }}"></script>

<!-- toastr init -->
<script src="{{ asset('assets/js/pages/toastr.init.js') }}"></script>

<!-- Required datatable js -->
<script src="{{asset('assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{asset('assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<!-- Datatable init js -->
<script src="{{asset('assets/js/pages/datatables.init.js') }}"></script>
@endsection