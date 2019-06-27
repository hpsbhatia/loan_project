@extends('layouts.home')

@section('content')

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">


                <div class="row">
                    <div class="col-md-8 col-md-offset-2">


                        <h3 style="text-align: center;margin-bottom: 0px; text-transform: uppercase;">Your Room Booking </h3>

                        <div class="row">
                            <div class="col-md-12">

                                <!--  ==================================VALIDATION ERRORS==================================  -->
                                @if($errors->any())
                                    @foreach ($errors->all() as $error)

                                        <div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert"
                                                    aria-hidden="true">&times;</button>
                                            {!!  $error !!}
                                        </div>

                                @endforeach
                            @endif
                            <!--  ==================================SESSION MESSAGES==================================  -->

                            </div>
                        </div>
                        <hr>
                            <div class="row">

                                <div class="bootstrap-iso margin-bottom-10">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">

                                                {!! Form::open(['route'=>'re-room-book']) !!}

                                                <div class="row" style="margin-top:15px">

                                                    <div class="col-md-6">
                                                        <label>Select Room:</label>
                                                        <select name="room_id" id="" class="form-control input-lg">
                                                            @foreach($package as $p)
                                                                @if($p->id == $room->id)
                                                                    <option value="{{ $p->id }}" selected>{{ $p->name }} - {{ $p->price }} {{ $p->currency->name }}</option>
                                                                @else
                                                                    <option value="{{ $p->id }}">{{ $p->name }} - {{ $p->price }} {{ $p->currency->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label>Select Date:</label>
                                                        <input type="text" name="date" class="daterange form-control input-lg" placeholder="Select Date" style="background: #fff;" required>
                                                    </div>

                                                </div>
                                                <br>
                                                <div class="col_full nobottommargin" style="margin-top: 20px;">
                                                    <button class="button button-3d btn-block nomargin"
                                                            id="register-form-submit"
                                                            name="register-form-submit" value="register">Book Now
                                                    </button>
                                                </div>

                                                {!! Form::close() !!}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <br>


                    </div>


                </div><!-- row  -->


            </div>
        </div>
    </section>



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


    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

    <script type="text/javascript">
        $(function() {

            $('input[name="date"]').daterangepicker({
                autoUpdateInput: false,
                format : 'YYYY-MM-DD',
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('input[name="date"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + '/' + picker.endDate.format('YYYY-MM-DD'));
            });

            $('input[name="date"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

        });
    </script>

@endsection