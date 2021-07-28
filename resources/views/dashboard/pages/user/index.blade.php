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

        @if(isset($filter) && $filter)
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Filter {{ $page }}</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="form">
                                <form
                                    action="{{ route('users.index') }}"
                                    method="GET"
                                >
                                    <div class="row">
                                        <div class="form-group col-md-10">
                                            <select
                                                class="form-control"
                                                id="org"
                                                name="org"
                                                required
                                            >
                                                <option value=""></option>
                                                @foreach($organizations ?? [] as $orgId => $org)
                                                    <option
                                                        value="{{ $orgId }}"
                                                        {{ ($orgId == ($selected_organization ?? 0)) ? 'selected' : '' }}
                                                    >
                                                        {{ $org }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-block btn-primary"
                                                title="Apply Filter"
                                            >
                                                <i class="fa fa-search fa-fw"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>List of All {{ $page }}</h5>
                        <div class="ibox-tools">
                            @if(1)
                                <a
                                    title="{{ $actions['add'] .' '. $resource }}"
                                    class="btn btn-primary btn-xs"
                                    href="{{ $crud['create'] ?? 'javascript::void(0)' }}"
                                >
                                    <i class="fa-fw fa fa-plus"></i>
                                </a>
                            @endif
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            @includeIf('dashboard.pages.user._table')
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- start modals --}}
    @includeIf($modalDelete, ['resource' => $resource ?? ''])

    <div
        class="modal inmodal "
        id="modal__switch_role"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">{{ trans('lang.actions.confirm') }}</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want make this user ADMIN?</p>
                    <p>
                        User once switched will lose its previous information and can not be reverted.
                        Also, User will be able to perform actions as per Admin Role.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button
                        type="button"
                        class="btn btn-danger"
                        id="btn__switch_role"
                    >
                        {{ trans('lang.actions.confirm') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- end modals --}}
@endsection

@section('scripts')
    <script>
        {{-- ***************** datatable *************** --}}
        $(document).ready(function(){
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

            // select2
            $(".select2").select2();
            $("#org").select2({
                placeholder: "Select Organization to Filter Users",
                allowClear: true
            });
        });

        {{-- ***************** action *************** --}}

        $('.user__delete').on('click', function(e){
            e.preventDefault();
            var $form = $(this);
            $('#modal__global_delete').modal({ backdrop: 'static', keyboard: false })
                .on('click', '#delete__btn', function(){
                    $form.submit();
                });
        });

        $('.user__switch_to_admin').on('click', function(e){
            e.preventDefault();
            var $href = $(this);
            $('#modal__switch_role').modal({ backdrop: 'static', keyboard: false })
                .on('click', '#btn__switch_role', function(){
                    window.location = $href.attr('href');
                });
        });
    </script>
@endsection
