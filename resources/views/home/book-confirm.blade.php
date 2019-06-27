@extends('layouts.home')

@section('content')

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">


                <div class="row">
                    <div class="col-md-8 col-md-offset-2">


                        <h3 style="text-align: center;margin-bottom: 0px; text-transform: uppercase;">Your Booking Details </h3>

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
                        @if($check != null)
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <span style="font-weight: bold;font-size: 18px;">Your Selected Date : </span>
                                @foreach($dates as $key => $d)
                                    <span style="font-weight: bold;font-size: 18px;line-height: 50px;font-style: italic;border: 2px solid #000;border-radius: 5px;padding: 5px;">{{ date('d-F-Y',strtotime($d)) }}</span>
                                @endforeach
                            </div>
                            <div class="col-md-12 text-center">
                                <span style="font-weight: bold;font-size: 18px;">Selected Room : </span>
                                <span style="font-weight: bold;font-size: 18px;line-height: 50px;font-style: italic;border: 2px solid red;color: red;border-radius: 5px;padding: 5px;">{{ $room->name }}</span>
                            </div>
                            <div class="col-md-12 text-center">
                                <span style="font-weight: bold;font-size: 18px;">Already Taken This Date : </span>
                                @foreach($check as $key => $d)
                                    <span style="font-weight: bold;font-size: 18px;line-height: 50px;font-style: italic;border: 2px solid red;color: red;border-radius: 5px;padding: 5px;">{{ date('d-F-Y',strtotime($d)) }}</span>
                                @endforeach
                            </div>
                            <br>
                            <div class="bootstrap-iso margin-bottom-10">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">

                                            {!! Form::open(['route'=>'re-room-book']) !!}

                                            @foreach($dates as $key => $value)
                                                @php $d = date('d-m-Y',strtotime($value)) @endphp
                                                <input type="hidden" name="date[]" value='{{ $d }}'>
                                            @endforeach

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
                                                    <label>Change Select Date:</label>
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
                        @else

                        <div class="row">

                            <div class="col-md-12 text-center">
                                <p><span style="font-weight: bold;font-size: 18px;">Room Name : </span> <span
                                            style="font-weight: bold;font-size: 18px;font-style: italic;border: 2px solid #000;border-radius: 5px;padding: 5px;">{{ $room->name }}</span>
                                </p>
                            </div>
                            <div class="col-md-12 text-center">
                                <p><span style="font-weight: bold;font-size: 18px;">Room Category : </span> <span
                                            style="font-weight: bold;font-size: 18px;font-style: italic;border: 2px solid #000;border-radius: 5px;padding: 5px;">{{ $room->category->name }}</span>
                                </p>
                            </div>
                            <div class="col-md-12 text-center">
                                <p><span style="font-weight: bold;font-size: 18px;">Total Price : </span> <span
                                            style="font-weight: bold;font-size: 18px;font-style: italic;border: 2px solid #000;border-radius: 5px;padding: 5px;">{{ $price }} - {{ $room->currency->name }}</span>
                                </p>
                            </div>
                            <div class="col-md-12 text-center">
                                <p>

                                    <span style="font-weight: bold;font-size: 18px;">Your Selected Date : </span>
                                    @foreach($dates as $key => $d)
                                        <span style="font-weight: bold;font-size: 18px;line-height: 50px;font-style: italic;border: 2px solid #000;border-radius: 5px;padding: 5px;">{{ date('d-F-Y',strtotime($d)) }}</span>
                                    @endforeach

                                </p>
                            </div>

                            <div class="bootstrap-iso margin-bottom-10">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">

                                            {!! Form::open(['route'=>'user-book-confirm','method'=>'post']) !!}

                                            <span style="color: #{{ $site_color }};font-size: 20px;font-weight: bold;border-bottom: 2px solid #{{ $site_color }};border-bottom: 2px dotted #{{ $site_color }};padding-bottom: 5px;">Personal Information</span>

                                            @foreach($dates as $key => $value)
                                                @php $d = date('d-m-Y',strtotime($value)) @endphp
                                                <input type="hidden" name="date[]" value='{{ $d }}'>
                                            @endforeach
                                            <input type="hidden" name="room_id" value="{{ $room->id }}">
                                            <input type="hidden" name="duration" value="{{ $duration }}">

                                            <div class="row" style="margin-top:15px">

                                                <div class="col-md-6">
                                                    <label>First Name:</label>
                                                    <input name="first_name" class="form-control input-lg" type="text"
                                                           required="" placeholder="First Name">
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Last Name:</label>
                                                    <input name="last_name" class="form-control input-lg" type="text"
                                                           required="" placeholder="Last Name">
                                                </div>

                                            </div>
                                            <br>

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <label>Email Address:</label>
                                                    <input id="email" name="email" class="form-control input-lg"
                                                           type="email"
                                                           required="" placeholder="Email Address">
                                                    <div id="emailerr"></div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Phone Number:</label>
                                                    <input id="phone" name="phone" class="form-control input-lg" type="text"
                                                           required=""
                                                           maxlength="11" placeholder="Phone Number">
                                                    <div id="phoneerr"></div>
                                                </div>

                                            </div>
                                            <br>

                                            <div class="row">

                                                <div class="col-md-12">
                                                    <label>Address:</label>
                                                    <textarea name="address" id="" cols="30" rows="5"
                                                              class="input-lg form-control" required
                                                              placeholder="Address"></textarea>
                                                </div>


                                            </div>

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
                        @endif
                        <br>


                    </div>


                </div><!-- row  -->


            </div>
        </div>
    </section>
    <!-- Modal for DELETE -->
    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-check'></i> Confirm !</h4>
                </div>

                <div class="modal-body">
                    <strong>Are you sure you want to Confirm Order ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{--{{ route('order-confirm') }}--}}" class="form-inline">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" class="abir_id" value="0">

                        <button type="button" class="btn btn-primay" data-dismiss="modal"><i class="fa fa-times"></i> Not Sure</button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i> Yes Sure..!</button>
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