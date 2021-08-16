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
                        <h5>New {{ $page }}</h5>
                    </div>

                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-12">

                                <form
                                action="{{ route('dashboard.comment.store', [
                                    'assessment' => $assessment,
                                    'patient' => $patient
                                    ]) }}"
                                    method="POST"
                                    id="step1"
                                    name="step1"
                                    class="step1"
                                >
                                    @csrf
                                    <div 
                                    class="form-group"
                                    >
                                        <label 
                                            for="comment"
                                        >
                                        Comment:
                                        </label>
                                        <textarea 
                                        name="comment" 
                                        class="form-control" 
                                        id="comment" 
                                        rows="10"></textarea>
                                    </div>
                                    <button
                                            id="button_submit"
                                            type="submit"
                                            class="btn btn-primary m-r"
                                        >
                                            Save
                                        </button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection



