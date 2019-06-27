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
                                    <td>{{ $p->loner->package->rate }} - {{ $p->loner->package->currency->name }}</td>
                                    <td>
                                        @if($p->pay_status == 0)
                                            <span class="label control-label label-primary"><i class="fa fa-check"></i> No Fine</span>
                                        @else
                                            <span class="label control-label label-success"><i class="fa fa-plus"></i> {{ $p->loner->package->fine }} {{ $p->loner->package->currency->name }}</span>
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

        <div class="text-center">
            <a href="{{ route('staff-lend-create') }}" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Create New Loner</a>
        </div>
    @else

        <div class="text-center">
            <h3>No Data available</h3>
        </div>
    @endif


@endsection

@section('scripts')

    <script type="text/javascript">
        window.onbeforeunload = function() {
            return "Dude, are you sure you want to leave? Think of the kittens!";
        }
    </script>

    <script>
        $(document).ready(function () {

            $(document).on("click", '.delete_button', function (e) {
                var id = $(this).data('id');
                $(".abir_id").val(id);

            });

        });
    </script>


@endsection

