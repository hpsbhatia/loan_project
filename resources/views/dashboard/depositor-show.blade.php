@extends('layouts.dashboard')
@section('title', 'All Currency')
@section('content')


    @if(count($loner))

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
                                <th>Loan Number</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Package</th>
                                <th>Amount</th>
                                <th>Staff</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i=0;@endphp
                            @foreach($loner as $p)
                                @php $i++;@endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $p->depositor_number }}</td>
                                    <td>{{ $p->first_name }} {{ $p->last_name }}</td>
                                    <td>{{ $p->email_name }}</td>
                                    <td>{{ $p->phone_number }}</td>
                                    <td>{{ $p->package->name }}</td>
                                    <td>{{ $p->package->amount }} - {{ $p->package->currency->name }}</td>
                                    <td>{{ $p->staff->username }}</td>
                                    <td>

                                        <a href="{{ route('depositor-schedule',$p->depositor_number) }}" class="btn purple btn-sm"><i class="fa fa-eye"></i> Schedule</a>

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
            {!! $loner->render() !!}
        </div>
    @else

        <div class="text-center">
            <h3>No Data available</h3>
        </div>
    @endif



@endsection


