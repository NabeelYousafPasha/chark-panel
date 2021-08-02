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
                            <div class="">
                                <form action="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Bill To: </label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Patient/ID/Alias:</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1">
                                    </div>
                                    <fieldset class="form-group">
                                        <label for="radio">Gender</legend>
                                        <div class="row">
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                            <label class="form-check-label" for="gridRadios1">
                                                Male
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Female
                                            </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Country: </label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="textarea">Patient's Other Details (Optional): </label>
                                        <textarea name="" id="" cols="140" rows="10"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="profession">Profession:</label>
                                        <input type="text" class="form-control" id="profession">
                                    </div>
                                    <div class="form-group">
                                        <label for="personal_id">Personal ID:</label>
                                        <input type="text" class="form-control" name="personal_id" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone">Telephone Number:</label>
                                        <input type="number" class="form-control" name="telephone" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" name="email" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address:</label>
                                        <input type="text" class="form-control" name="address" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="post_code">Post Code:</label>
                                        <input type="text" class="form-control" name="post_code" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="city">City:</label>
                                        <input type="text" class="form-control" name="city" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="province">Province:</label>
                                        <input type="text" class="form-control" name="province" id="">
                                    </div>
                                    <button type="submit" class="btn btn-secondary" style="float: right">Cancel</button>
                                    <button type="submit" class="btn btn-secondary" style="float: right; margin-right:20px;">Save Patient</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



