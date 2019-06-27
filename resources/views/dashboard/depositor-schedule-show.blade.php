@extends('layouts.dashboard')
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
                                            <span class="label control-label label-primary"><i class="fa fa-check"></i> No Fine</span>
                                        @else
                                            <span class="label control-label label-success"><i class="fa fa-plus"></i> {{ $p->depositor->package->fine }} {{ $p->depositor->package->currency->name }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($p->status == 0)
                                            <span class="label control-label label-primary"><i class="fa fa-spinner"></i> Upcoming</span>
                                        @elseif($p->status == 1)
                                            <span class="label control-label label-success"><i class="fa fa-spinner"></i> Received</span>
                                        @else
                                            <span class="label control-label label-success"><i class="fa fa-check"></i> Complete</span>
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
                    <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-trash'></i> Delete !</h4>
                </div>

                <div class="modal-body">
                    <strong>Are you sure you want to Delete ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('currency_delete') }}" class="form-inline">
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

