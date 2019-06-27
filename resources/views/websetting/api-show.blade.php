@extends('layouts.dashboard')
@section('title', 'API Show')

@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="portlet light bordered">
                <div class="portlet-body form">

                    <div class="row">
                        @foreach($menu as $m)
                        <div class="col-md-6">
                            <div class="text-center"><b>{{ $m->name }}</b></div>
                            <div class="text-center"><b>{{ $m->type }}</b></div>
                            <br>
                            <p class="text-center">
                                {!! $m->fields !!}
                            </p>
                            <div class="col-md-6">
                                <a href="{{ route('api-edit',$m->id) }}" class="btn blue btn-block margin-top-20"><i class="fa fa-edit"></i> Edit API </a>
                            </div>
                            {{ Form::open(['route'=>['api-delete',$m->id],'method'=>'DELETE']) }}
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-danger btn-block margin-top-20" onclick="return confirm('Are You Sure..!')"><i class="fa fa-trash"></i> Delete API </button>
                            </div>
                            {{ Form::close() }}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </div><!---ROW-->


@endsection
