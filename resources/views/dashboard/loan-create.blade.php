@extends('layouts.dashboard')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    {!! Form::open(['method'=>'post','class'=>'form-horizontal']) !!}
                    <div class="form-body">


                        <div class="form-group">
                            <label class="col-sm-3 control-label">Loan Package Name : </label>

                            <div class="col-sm-6">
                                <input name="name" value="" class="form-control input-lg" type="text" required placeholder="Loan Package Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Loan Amount : </label>
                            <div class="col-sm-2">
                                <select name="currency_id" id="" class="form-control input-lg" required>
                                    <option value="">Select One</option>
                                    @foreach($currency as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input name="amount" value="" class="form-control input-lg" type="number" required placeholder="Loan Amount">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Loan Interest : </label>

                            <div class="col-sm-6">
                                <input name="percentage" value="" class="form-control input-lg" type="number" required placeholder="Loan Interest">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">No Of Installment : </label>

                            <div class="col-sm-6">
                                <input name="installment" value="" class="form-control input-lg" type="number" required placeholder="No Of Installment">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Par Installment Amount: </label>

                            <div class="col-sm-6">
                                <input name="rate" value="" class="form-control input-lg" type="number" required placeholder="Par Installment Amount">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Installment Type : </label>

                            <div class="col-sm-6">
                                <select name="type_id" id="" class="form-control input-lg" required>
                                    <option value="">Select One</option>
                                    @foreach($type as $t)
                                        <option value="{{ $t->id }}">{{ $t->name }} - {{ $t->day }} Day</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Fine Par Installment : </label>

                            <div class="col-sm-6">
                                <input name="fine" value="" class="form-control input-lg" type="number" required placeholder="Fine Par Installment">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn blue btn-block margin-top-10"> <i class="fa fa-send"></i> Create New Loan Package</button>
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

