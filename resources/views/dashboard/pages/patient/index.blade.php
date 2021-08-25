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
                        <h5>List of All {{ $page }}</h5>
                        <div class="ibox-tools">
                            @if($crud['CREATE_PATIENT']['can'] ?? false)
                                <a
                                    data-toggle="modal" 
                                    data-target="#myModal"
                                    class="btn btn-primary btn-xs"
                                   
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
                            @includeIf('dashboard.pages.patient._table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <!-- modal header  -->
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Bootstrap 3 Modal Header</h4>
        </div>
        <div class="modal-body">
        <!-- begin modal body content  -->
          <section class="stage">
            <figure class="ball"><span class="shadow"></span></figure>
          </section>
        <!-- end modal body content  -->
        </div>
        <div class="modal-footer">
          <!-- modal footer  -->
          
          <a  
          title="{{ $actions['add'] .' '. $resource }}"
          href="{{ $crud['CREATE_PATIENT']['route'] ?? 'javascript::void(0)' }}"
          class="btn btn-primary"
          >
           Agree
          </a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>

    </div>
  </div>
<!-- </div> -->

    {{-- start modals --}}
    @includeIf($modalDelete, ['resource' => $resource ?? ''])
    {{-- end modals --}}
@endsection

@section('scripts')
    <script>
        {{-- ****** datatable ****** --}}
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

        });

        {{-- ****** action ****** --}}

        $('.patient__delete').on('click', function(e){
            e.preventDefault();
            let $form = $(this);
            $('#modal__global_delete').modal({ backdrop: 'static', keyboard: false })
                .on('click', '#delete__btn', function(){
                    $form.submit();
                });
        });
    </script>
@endsection