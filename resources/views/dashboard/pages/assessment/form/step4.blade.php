@extends('dashboard.layout.app')

@section('stylesheets')
    <!-- Filepond stylesheet -->
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>{{ $page }}</h2>
            @includeIf('dashboard.globals.breadcrumb.breadcrumbs')
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row" style="text-align: justify">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>New {{ $page }}</h5>
                    </div>
                    <div class="ibox-content">

                        @include('dashboard.pages.assessment.form.progress', ['step' => 'step4',])

                        <div class="row">
                            <div class="col-md-12">

                                @if($assessment ?? false)
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2>Uploads:</h2>
                                        <br>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <button
                                            type="button"
                                            class="btn btn-primary btn-block"
                                            id="btn_cbct"
                                            data-toggle="modal"
                                            data-target="#modal__cbct"
                                        >
                                            CBCT
                                        </button>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <button
                                            type="button"
                                            class="btn btn-primary btn-block"
                                            id="btn_photos"
                                            data-toggle="modal"
                                            data-target="#modal__photo"
                                        >
                                            Photo
                                        </button>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <button
                                            type="button"
                                            class="btn btn-primary btn-block"
                                            id="btn_xray"
                                            data-toggle="modal"
                                            data-target="#modal__xray"
                                        >
                                            X-Ray
                                        </button>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <button
                                            type="button"
                                            class="btn btn-primary btn-block"
                                            id="btn_sleep_study"
                                            data-toggle="modal"
                                            data-target="#modal__sleep_study"
                                        >
                                            Sleep Study
                                        </button>
                                    </div>
                                </div>
                                @endif

                                <hr>

                                <form
                                    action="{{ $route }}"
                                    method="POST"
                                    id="step4"
                                    name="step4"
                                    class="step4"
                                    enctype="multipart/form-data"
                                >
                                    @csrf
                                    @method($_method)

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="row form-group @error('ahi') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="ahi"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        AHI:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="text"
                                                        id="ahi"
                                                        name="ahi"
                                                        class="form-control"
                                                        required=""
                                                        value="{{ $diagnosticTest->ahi ?? old('ahi') }}"
                                                    >
                                                    @error('ahi')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('rdi') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="rdi"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        RDI:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="text"
                                                        id="rdi"
                                                        name="rdi"
                                                        class="form-control"
                                                        required=""
                                                        value="{{ $diagnosticTest->rdi ?? old('rdi') }}"
                                                    >
                                                    @error('rdi')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('nadir') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="nadir"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        NADIR:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="text"
                                                        id="nadir"
                                                        name="nadir"
                                                        class="form-control"
                                                        required=""
                                                        value="{{ $diagnosticTest->nadir ?? old('nadir') }}"
                                                    >
                                                    @error('nadir')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('odi') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="odi"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        ODI:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="text"
                                                        id="odi"
                                                        name="odi"
                                                        class="form-control"
                                                        required=""
                                                        value="{{ $diagnosticTest->odi ?? old('odi') }}"
                                                    >
                                                    @error('odi')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('avg_duration_of_apnea') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="avg_duration_of_apnea"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Average duration of apnea (sec):
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="number"
                                                        id="avg_duration_of_apnea"
                                                        name="avg_duration_of_apnea"
                                                        class="form-control"
                                                        min="0"
                                                        required=""
                                                        value="{{ $diagnosticTest->avg_duration_of_apnea ?? old('avg_duration_of_apnea') }}"
                                                    >
                                                    @error('avg_duration_of_apnea')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('max_duration_of_apnea') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="max_duration_of_apnea"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Maximum duration of apnea(sec):
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="number"
                                                        id="max_duration_of_apnea"
                                                        name="max_duration_of_apnea"
                                                        class="form-control"
                                                        min="0"
                                                        required=""
                                                        value="{{ $diagnosticTest->max_duration_of_apnea ?? old('max_duration_of_apnea') }}"
                                                    >
                                                    @error('max_duration_of_apnea')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row form-group @error('assessments_observation') has-error @enderror">
                                                <div class="col-md-12">
                                                    <label
                                                        for="assessments_observation"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Assessment Observation
                                                    </label>
                                                    <textarea
                                                        id="assessments_observation"
                                                        name="assessments_observation"
                                                        class="form-control"
                                                        rows="12"
                                                        required=""
                                                    >{{ $diagnosticTest->assessments_observation ?? old('assessments_observation') }}</textarea>
                                                    @error('assessments_observation')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row form-group text-right">
                                        <a
                                            href="{{ route('dashboard.assessment.create.step', ['patient' => $patient, 'step' => 'step3']) }}"
                                            class="btn btn-default m-r"
                                        >
                                            Back
                                        </a>
                                        <button
                                            id="button_step4"
                                            type="submit"
                                            class="btn btn-primary m-r"
                                        >
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Modals --}}
    @if($assessment ?? false)
        <div
            class="modal inmodal "
            id="modal__cbct"
            tabindex="-1"
            role="dialog"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content animated flipInY">

                   {{-- <form
                        id="form__cbct"
                        method="POST"
                        action="{{ route('dashboard.assessment.store.media', ['assessment' => $assessment->id, 'mediaType' => 'cbct']) }}"
                        enctype="multipart/form-data"
                    >
                        @csrf--}}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Upload CBCT</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row form-group @error('cbct') has-error @enderror">
                                <label
                                    for="cbct"
                                    class="col-form-label text-md-left"
                                >
                                    CBCT:
                                </label>
                                <!-- We'll transform this input into a pond -->
                                <input
                                    type="file"
                                    id="cbct"
                                    name="cbct"
                                    class="filepond"
                                    data-max-file-size="3MB"
                                    data-max-files="1"
                                >
                                <span class="help-block small">
                                    Allowed: Zip file
                                </span>
                                @error('cbct')
                                    <span class="help-block has-error">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white refresh-page">Close</button>
                            <button
                                type="button"
                                class="btn btn-primary refresh-page"
                                id="modal__btn_sleep_study"
                            >
                                Upload
                            </button>
                        </div>
{{--                    </form>--}}
                </div>
            </div>
        </div>

        <div
            class="modal inmodal "
            id="modal__photo"
            tabindex="-1"
            role="dialog"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content animated flipInY">

                    <form
                        id="form__photo"
                        method="POST"
                        action="{{ route('dashboard.assessment.store.media', ['assessment' => $assessment->id, 'mediaType' => 'photo']) }}"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Upload Photo</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row form-group @error('photo') has-error @enderror">
                                <label
                                    for="photo"
                                    class="col-form-label text-md-left"
                                >
                                    Photo:
                                </label>
                                <!-- We'll transform this input into a pond -->
                                <input
                                    type="file"
                                    id="photo"
                                    name="photo"
                                    class="filepond"
                                >
                                <span class="help-block small">
                                    Allowed: png, jpg, jpeg
                                </span>
                                @error('photo')
                                    <span class="help-block has-error">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button
                                type="submit"
                                class="btn btn-primary"
                                id="modal__btn_photo"
                            >
                                Upload
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div
            class="modal inmodal "
            id="modal__xray"
            tabindex="-1"
            role="dialog"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content animated flipInY">
                    <form
                        id="form__xray"
                        method="POST"
                        action="{{ route('dashboard.assessment.store.media', ['assessment' => $assessment->id, 'mediaType' => 'xray']) }}"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Upload X-Ray</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row form-group @error('xray') has-error @enderror">
                                <label
                                    for="xray"
                                    class="col-form-label text-md-left"
                                >
                                    X-Ray:
                                </label>
                                <!-- We'll transform this input into a pond -->
                                <input
                                    type="file"
                                    id="xray"
                                    name="xray"
                                    class="filepond"
                                >
                                <span class="help-block small">
                                    Allowed: png, jpg, jpeg, zip file
                                </span>
                                @error('xray')
                                    <span class="help-block has-error">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white refreshPage" data-dismiss="modal" >Close</button>
                            <button
                                type="submit"
                                class="btn btn-primary refreshPage"
                                id="modal__btn_xray"
                            >
                                Upload
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div
            class="modal inmodal "
            id="modal__sleep_study"
            tabindex="-1"
            role="dialog"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content animated flipInY">
                    <form
                        id="form__sleep_study"
                        method="POST"
                        action="{{ route('dashboard.assessment.store.media', ['assessment' => $assessment->id, 'mediaType' => 'sleep_study']) }}"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Upload Sleep Study</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row form-group @error('sleep_study') has-error @enderror">
                                <label
                                    for="sleep_study"
                                    class="col-form-label text-md-left"
                                >
                                    Sleep Study:
                                </label>
                                <!-- We'll transform this input into a pond -->
                                <input
                                    type="file"
                                    id="sleep_study"
                                    name="sleep_study"
                                    class="filepond"
                                >
                                <span class="help-block small">
                                    Allowed: png, jpg, jpeg, docx, pdf file
                                </span>
                                @error('sleep_study')
                                    <span class="help-block has-error">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-white refresh-page">Close</button>
                            <button
                                type="button"
                                class="btn btn-primary refresh-page"
                                id="modal__btn_sleep_study"
                            >
                                Upload
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

@endsection

@section('scripts')
    <!-- Load FilePond library -->
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

    <script>
        // Get a reference to the file input element
        const cbctFile = document.querySelector('input[id="cbct"]');

        // Create a FilePond instance
        const cbctPond = FilePond.create(cbctFile);

        cbctPond.setOptions({
            server: {
                url: '{{ route('dashboard.assessment.store.media', ['assessment' => $assessment->id, 'mediaType' => 'cbct', 'requestAjaxType' => true]) }}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                revert: (response, load, error) => {
                    let fileId = JSON.parse(response).file_id;
                    // Should remove the earlier created temp file here
                    {{--let route = "{{ route('dashboard.assessment.delete.media', ['localMedia' => ':file']) }}";--}}
                    {{--route = route.replace(':file', response.file_id);--}}
                    $.ajax({
                        type: 'GET',
                        url: "/dashboard/patients/assessments/localMedia/"+fileId,
                        success: function(data) {
                            console.log(data);
                        }

                    });

                    // Can call the error method if something is wrong, should exit after
                    error('oh my goodness');

                    // Should call the load method when done, no parameters required
                    load();
                },
            },
        });

        $('.refresh-page').on('click', function(){
            console.log('test');
           location.reload();
        });


    </script>
@endsection


