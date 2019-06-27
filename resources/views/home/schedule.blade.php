@extends('layouts.home')
@section('style' )

    <link rel="stylesheet" href="{{ asset('css/bs-datatable.css') }}" type="text/css" />

@endsection
@section('content')


    <!-- Content
		============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">


                <div class="table-responsive">

                    <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Number</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Installment</th>
                            <th>Fine</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($type == 1)
                            @foreach($schedule as $p)
                            <tr>
                                <td>{{ $p->loner_number }}</td>
                                <td>{{ $p->loner->first_name }} {{ $p->loner->last_name }}</td>
                                <td>{{ $p->loner->email_name }}</td>
                                <td>{{ $p->loner->phone_number }}</td>
                                <td>{{ date('d-F-Y',strtotime($p->date)) }}</td>
                                <td>{{ $p->loner->package->rate }} - {{ $p->loner->package->currency->name }}</td>
                                <td>
                                    @if($p->pay_status == 0)
                                        <span class="label control-label label-primary"><i class="fa fa-spinner"></i> Upcoming</span>
                                    @elseif($p->pay_status == 2)
                                        <span class="label control-label label-primary"><i class="fa fa-check"></i> No Fine</span>
                                    @else
                                        <span class="label control-label label-danger"><i class="fa fa-plus"></i> {{ $p->loner->package->fine }} {{ $p->loner->package->currency->name }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($p->paid_status == 1)
                                        <span class="label control-label label-primary"><i class="fa fa-check"></i> Completed</span>
                                    @elseif($p->pay_status == 1)
                                        <span class="label control-label label-danger"><i class="fa fa-exclamation-triangle"></i> Not Pay</span>
                                    @else
                                        <span class="label control-label label-primary"><i class="fa fa-spinner"></i> Upcoming</span>
                                    @endif

                                </td>
                            </tr>
                            @endforeach
                        @else
                            @foreach($schedule as $p)
                                <tr>
                                    <td>{{ $p->loner_number }}</td>
                                    <td>{{ $p->depositor->first_name }} {{ $p->depositor->last_name }}</td>
                                    <td>{{ $p->depositor->email_name }}</td>
                                    <td>{{ $p->depositor->phone_number }}</td>
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
                                        @if($p->paid_status == 1)
                                            <span class="label control-label label-primary"><i class="fa fa-check"></i> Completed</span>
                                        @elseif($p->pay_status == 1)
                                            <span class="label control-label label-danger"><i class="fa fa-exclamation-triangle"></i> Not Pay</span>
                                        @else
                                            <span class="label control-label label-primary"><i class="fa fa-spinner"></i> Upcoming</span>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>

            </div>

        </div>

    </section><!-- #content end -->


@endsection
@section('scripts')

    <!-- Bootstrap Data Table Plugin -->
    <script type="text/javascript" src="{{ asset('js/bs-datatable.js') }}"></script>

    <!-- Footer Scripts
    ============================================= -->
    <script type="text/javascript" src="js/functions.js"></script>

    <script>

        $(document).ready(function() {
            $('#datatable1').dataTable();
        });

    </script>
@endsection
