@extends('dashboard.layout.app')

@section('stylesheets')
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>{{ $page }}</h2>
            @includeIf('dashboard.globals.breadcrumb.breadcrumbs')
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Filter {{ $page }}</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-12">
                                @include('dashboard.globals.form.form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>List of All {{ $page }}</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            @includeIf('dashboard.pages.useractivity._table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- start modals --}}
    @includeIf($modalDelete, ['resource' => $resource ?? ''])
    {{-- end modals --}}
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            {{-- ***************** datatable *************** --}}
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv', title: 'Data'},
                    {extend: 'excel', title: 'Data'},
                    {extend: 'pdf', title: 'Data'},
                    {
                        extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');
                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]
            });

            {{-- ***************** select2 *************** --}}
            $("#user").select2({
                placeholder: "Select an User",
                allowClear: true
            });

        });
    </script>
@endsection
