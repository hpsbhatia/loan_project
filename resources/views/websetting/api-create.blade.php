@extends('layouts.dashboard')
@section('title', 'Create API')

@section('content')


    <div class="row">
        <div class="col-md-12">

            <div class="portlet light bordered">
                <div class="portlet-body form">
                    {!! Form::open() !!}
                    <div class="form-body">
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>API Name</strong></label>

                                <div class="col-md-3">
                                    <input class="form-control input-lg" name="name" value=""
                                           type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>API Type</strong></label>

                                <div class="col-md-3">
                                    <input class="form-control input-lg" name="type" value=""
                                           type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>API Fields</strong></label>

                                <div class="col-md-6">
                                    <textarea name="fields" id="" cols="30" rows="5"
                                              class="input-lg"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-3 col-md-3">
                                <button type="submit" class="btn blue btn-block margin-top-20">Create API</button>
                            </div>
                        </div>

                    </div>
                    {!! Form::close() !!}
                </div>
            </div>


        </div>
    </div><!---ROW-->


@endsection
@section('scripts')

    <link href="{{asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/pages/scripts/components-editors.min.js')}}" type="text/javascript"></script>

@endsection