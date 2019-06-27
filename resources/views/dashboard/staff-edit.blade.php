@extends('layouts.dashboard')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    {!! Form::model($staff,['route'=>['staff-update',$staff->id],'method'=>'put','class'=>'form-horizontal']) !!}
                    <div class="form-body">


                        <div class="form-group">
                            <label class="col-sm-3 control-label"><b>Staff Name : </b></label>

                            <div class="col-sm-6">
                                <input name="name" value="{{ $staff->name }}" class="form-control input-lg" type="text" required placeholder="Staff Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><b>Staff Email : </b></label>

                            <div class="col-sm-6">
                                <input name="email" value="{{ $staff->email }}" class="form-control input-lg" type="email" required placeholder="Staff Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><b>Staff User Name : </b></label>

                            <div class="col-sm-6">
                                <input name="username" value="{{ $staff->username }}" class="form-control input-lg" type="text" required placeholder="Staff User Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><b>Staff Phone : </b></label>

                            <div class="col-sm-6">
                                <input name="phone" value="{{ $staff->phone }}" class="form-control input-lg" type="text" required placeholder="Staff Phone">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><b>Staff Status : </b></label>

                            <div class="col-sm-6">
                                <select name="status" id="" class="form-control input-lg" required>
                                    <option value="">Select One</option>
                                    @if($staff->status == 0)
                                        <option value="1">Active</option>
                                        <option value="0" selected>DeActive</option>
                                    @else
                                        <option value="1" selected>Active</option>
                                        <option value="0">DeActive</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn blue btn-block margin-top-10"><i class="fa fa-paper-plane"></i> Update Staff</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div><!---ROW-->


@endsection

