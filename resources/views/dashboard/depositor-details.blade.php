@extends('layouts.dashboard')
@section('style')
    <style>
        .well{
            text-align: center;
        }
    </style>
@endsection
@section('content')

    @if(count($details))

        <div class="row">
            <div class="col-md-12">

                <div class="col-md-6">
                    <div class="well">
                        <p><span>Name : </span> <i><b>{{ $details->first_name }} {{ $details->first_name }}</b></i></p>
                        <p><span>Email : </span> <i><b>{{ $details->email_name }}</b></i></p>
                        <p><span>Phone : </span> <i><b>{{ $details->phone_number }}</b></i></p>
                        <p><span>Father name : </span> <i><b>{{ $details->father_name }}</b></i></p>
                        <p><span>Mother name : </span> <i><b>{{ $details->mother_name }}</b></i></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="well">
                        <img style="width: 180px;height: 160px" src="{{ asset('images') }}/{{ $details->depositor_image }}" alt="">
                        <p><span>Date Of Birth : </span> <i><b>{{ date('d-F-Y',strtotime($details->birth_date)) }}</b></i></p>
                    </div>
                </div>

            </div>
        </div><!-- ROW-->
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="well">
                        <p><span>Package Name : </span> <i><b>{{ $details->package->name }}</b></i></p>
                        <p><span>Package Amount : </span> <i><b>{{ $details->package->amount }} - {{ $details->package->currency->name }}</b></i></p>
                        <p><span>No Of Installment : </span> <i><b>{{ $details->package->installment }}</b></i></p>
                        <p><span>Par Installment : </span> <i><b>{{ $details->package->rate }} - {{ $details->package->currency->name }}</b></i></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="well">
                        <p><span>Emergency  : </span> <i><b>{{ $details->emergency_name }}</b></i></p>
                        <p><span>Emergency Phone : </span> <i><b>{{ $details->emergency_phone }}</b></i></p>
                        <p><span>Emergency Relationship : </span> <i><b>{{ $details->emergency_relationship }}</b></i></p>
                        <p><span>Emergency Address : </span> <i><b>{{ $details->emergency_address }}</b></i></p>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <a href="{{ route('depositor-edit',$details->id) }}" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> Edit Details</a>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-danger btn-block delete_button"
                        data-toggle="modal" data-target="#DelModal"
                        data-id="{{ $details->id }}">
                    <i class='fa fa-send'></i> Confirm & Create Schedule
                </button>

            </div>
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
                    <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-check'></i> Confirm !</h4>
                </div>

                <div class="modal-body">
                    <strong>Are you sure you want to Crete Schedule ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('depositor-confirm') }}" class="form-inline">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" class="abir_id" value="0">

                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-time"></i> Close</button>
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
    </script>


@endsection

