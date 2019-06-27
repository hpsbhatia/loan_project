@extends('layouts.staff')
@section('content')


    @if(count($schedule))

        <div class="row">
            <div class="col-md-12">


                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">

                            <thead>
                            <tr>
                                <th>ID#</th>
                                <th>Installment Date</th>
                                <th>Installment Amount</th>
                                <th>Installment Fine</th>
                                <th>Installment Status</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i=0;@endphp
                            @foreach($schedule as $p)
                                @php $i++;@endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ date('d-F-Y',strtotime($p->date)) }}</td>
                                    <td>{{ $p->depositor->package->rate }} - {{ $p->depositor->package->currency->name }}</td>
                                    <td>
                                        @if($p->pay_status == 0)
                                            <span class="label control-label label-primary"><i class="fa fa-spinner"></i> Upcoming</span>
                                        @elseif($p->pay_status == 2)
                                            <span class="label control-label label-primary"><i class="fa fa-check"></i> No Fine</span>
                                        @else
                                            <span class="label control-label label-danger"><i class="fa fa-plus"></i> {{ $p->depositor->package->fine }} {{ $p->depositor->package->currency->name }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($p->status == 0)
                                            @if($p->date == date('d-m-Y',strtotime(\Carbon\Carbon::today())))
                                                <span class="label control-label label-primary"><i class="fa fa-spinner"></i> Upcoming</span>
                                            @else
                                                <button type="button" class="btn btn-primary btn-sm pay_button"
                                                        data-toggle="modal" data-target="#PayModal"
                                                        data-id="{{ $p->id }}">
                                                    <i class='fa fa-check'></i> Paid
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm delete_button"
                                                        data-toggle="modal" data-target="#DelModal"
                                                        data-id="{{ $p->id }}">
                                                    <i class='fa fa-ban'></i> Not Pay
                                                </button>
                                            @endif
                                        @elseif($p->pay_status == 2 and $p->paid_status == 0)
                                            <span class="label control-label label-success"><i class="fa fa-check"></i> Attended</span>
                                        @elseif($p->status == 1 and $p->pay_status == 1 and $p->paid_status == 0)
                                            <span class="label control-label label-danger"><i class="fa fa-exclamation-triangle"></i> Not Pay</span>
                                        @else
                                            <span class="label control-label label-primary"><i class="fa fa-check"></i> Completed</span>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div><!-- ROW-->


        <div class="text-center">
            {!! $schedule->render() !!}
        </div>
    @else

        <div class="text-center">
            <h3>No Data available</h3>
        </div>
    @endif

    <!-- Modal for DELETE -->
    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-trash'></i> Not Pay !</h4>
                </div>

                <div class="modal-body">
                    <strong>Are you Sure Loaner Not Pay ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('loaner-pay') }}" class="form-inline">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" class="abir_id" value="0">

                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-send"></i> Yes Sure..</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal for DELETE -->
    <div class="modal fade" id="PayModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-money'></i> Paid !</h4>
                </div>

                <div class="modal-body">
                    <strong>Are you Sure you want to Paid ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('loan-paid') }}" class="form-inline">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" class="hasan_id" value="0">

                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-send"></i> Yes Sure..!</button>
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
        $(document).ready(function () {

            $(document).on("click", '.pay_button', function (e) {
                var id = $(this).data('id');
                $(".hasan_id").val(id);

            });

        });
    </script>


@endsection

