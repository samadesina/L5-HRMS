@extends('hrms.layouts.base')

@section('content')
        <!-- START CONTENT -->
<div class="content">

    <header id="topbar" class="alt">
        <div class="topbar-left">
            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-asset-assignment/{id}')
                <ol class="breadcrumb">
                    <li class="breadcrumb-icon">
                        <a href="/dashboard">
                            <span class="fa fa-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-active">
                        <a href="/dashboard"> Dashboard </a>
                    </li>
                    <li class="breadcrumb-link">
                        <a href=""> Assets </a>
                    </li>
                    <li class="breadcrumb-current-item"> Edit </li>
                </ol>


            @else
                <ol class="breadcrumb">
                    <li class="breadcrumb-icon">
                        <a href="/dashboard">
                            <span class="fa fa-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-active">
                        <a href="/dashboard"> Dashboard </a>
                    </li>
                    <li class="breadcrumb-link">
                        <a href=""> Assets </a>
                    </li>
                    <li class="breadcrumb-current-item"> Assign Assets </li>
                </ol>
            @endif
        </div>
    </header>
    <!-- -------------- Content -------------- -->
    <section id="content" class="table-layout animated fadeIn" >
        <!-- -------------- Column Center -------------- -->
        <div class="chute-affix" data-spy="affix" data-offset-top="200">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel">
                        <div class="panel-heading">
                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-asset-assignment/{id}')
                                <span class="panel-title hidden-xs"> Edit Asset Assignment </span>
                            @else
                                <span class="panel-title hidden-xs"> Assign Asset</span>
                            @endif
                        </div>

                        <div class="panel-body pn">
                            <div class="table-responsive">
                                <div class="panel-body p25 pb10">
                                    @if(Session::has('flash_message'))
                                        <div class="alert alert-success">
                                            {{Session::get('flash_message')}}
                                        </div>
                                    @endif
                                    {!! Form::open(['class' => 'form-horizontal']) !!}
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Select Employee </label>
                                        <div class="col-md-6">
                                            <select class="select2-multiple form-control select-primary"
                                                    name="emp_id">
                                                @foreach($emps as $emp)
                                                    @if($emp->id == $assigns->emp_id)
                                                        <option value="{{$emp->id}}" selected>{{$emp->name}}</option>
                                                    @else
                                                        <option value="{{$emp->id}}">{{$emp->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Select Asset </label>
                                        <div class="col-md-6">
                                            <select class="select2-multiple form-control select-primary"
                                                    name="asset_id">
                                                @foreach($assets as $asset)
                                                    @if($asset->id == $assigns->asset_id))
                                                    <option value="{{$asset->id}}" selected>{{$asset->name}}</option>
                                                    @else
                                                        <option value="{{$asset->id}}">{{$asset->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="datepicker1" class="col-md-3 control-label"> Date of Assignment </label>
                                        <div class="col-md-6">

                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar text-alert pr11"></i>
                                                </div>
                                                <input type="text" id="datepicker1" class=" select2-single form-control" name="doa"
                                                       value="@if($assigns){{$assigns->date_of_assignment}}@endif"/>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="datepicker4" class="col-md-3 control-label"> Date of Release </label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar text-alert pr11"></i>
                                                </div>
                                                <input type="text" id="datepicker4" class="form-control"
                                                       name="dor"
                                                       value="@if($assigns){{$assigns->date_of_release}}@endif"/>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-2">

                                            <input type="submit" class="btn btn-bordered btn-info btn-block" value="Submit">

                                        </div>
                                        <div class="col-md-2"><a href="/edit-asset-assignment/{id}" >
                                                <input type="button" class="btn btn-bordered btn-success btn-block" value="Reset"></a></div>
                                    </div>

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>
@endsection