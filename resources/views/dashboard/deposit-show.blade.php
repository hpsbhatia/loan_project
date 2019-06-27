@extends('layouts.dashboard')
@section('style')

    <style>

        .pricing {
            text-align: center;
        }
        .pricing p{
            margin-bottom: 10px;
            font-size: 15px;
            font-weight: bold;
        }

    </style>
@endsection
@section('content')


    @if(count($loan))

        <div class="row">
            <div class="col-md-12">


                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row pricing">
                            @foreach($loan as $p)
                                <div class="col-md-4">
                                    <div class="well">
                                        <h3 style="border-bottom: 1px dotted #000;padding-bottom: 10px;"><b>{{ $p->name }}</b></h3>

                                        <h4><b>{{ $p->amount }} - {{ $p->currency->name }}</b></h4>
                                        <br>
                                        <p><i class="fa fa-check"></i> {{ $p->percentage }}% Interest </p>
                                        <br>
                                        <p><i class="fa fa-check"></i> {{ $p->installment }} - Installment</p>
                                        <br>
                                        <p><i class="fa fa-check"></i> {{ $p->rate }} {{ $p->currency->name }} - Par Installment</p>
                                        <br>
                                        <p><b><i class="fa fa-check"></i> {{ $p->type->name }} - Installment Type</b></p>
                                        <br>
                                        <p><i class="fa fa-check"></i> {{ $p->fine }} {{ $p->currency->name }} - Fine Par Installment</p>
                                        <br>
                                        <a href="{{ route('deposit-edit',$p->id) }}" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> Edit Package</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>

            </div>
        </div><!-- ROW-->


        <div class="text-center">
            {!! $loan->render() !!}
        </div>
    @else

        <div class="text-center">
            <h3>No Service Available</h3>
        </div>
    @endif

    <!-- Modal for DELETE -->
    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-trash'></i> Delete !</h4>
                </div>

                <div class="modal-body">
                    <strong>Are you sure you want to Delete ?</strong>
                </div>

                <div class="modal-footer">

                    <form method="post" action="{{--{{ route('room-delete') }}--}}" class="form-inline">
                        {!! csrf_field() !!}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="id" class="abir_id" value="0">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        $(document).ready(function () {

            $(document).on("click", '.delete_button', function (e) {
                var id = $(this).data('id');
                $(".abir_id").val(id);

            });

        });
    </script>

@endsection

