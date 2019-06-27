@extends('layouts.dashboard')
@section('title', 'Currency Create')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    {!! Form::model($type,['route'=>['type-update',$type->id],'method'=>'put','class'=>'form-horizontal']) !!}
                    <div class="form-body">


                        <div class="form-group">
                            <label class="col-sm-3 control-label"><b>Type Name : </b></label>

                            <div class="col-sm-6">
                                <input name="name" value="{{ $type->name }}" class="form-control input-lg" type="text" required placeholder="Installment Type Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><b>Conversion Day : </b></label>

                            <div class="col-sm-6">
                                <input name="day" value="{{ $type->day }}" class="form-control input-lg" type="number" required placeholder="1 Installment = How Much Day?">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn blue btn-block margin-top-10"><i class="fa fa-paper-plane"></i> Update Type</button>
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

