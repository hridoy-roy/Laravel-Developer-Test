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
                <h4 class="card-title mb-3">CREATE QUESTION SECTION</h4>
                {{-- <p class="card-title-desc">Use the tab JavaScript plugin—include
                    it individually or through the compiled <code class="highlighter-rouge">bootstrap.js</code>
                    file—to extend our navigational tabs and pills to create tabbable panes
                    of local content, even via dropdown menus.</p> --}}

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">Create Question</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">Questions List</span>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <livewire:question-create>
                    </div>
                    <div class="tab-pane" id="profile" role="tabpanel">
                        <livewire:question-list>
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