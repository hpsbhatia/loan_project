@extends('layouts.home')

@section('content')

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">


                <div class="row">
                    <div class="col-md-8 col-md-offset-2">


                        <h3 style="text-align: center;margin-bottom: 0px; text-transform: uppercase;">Booking Invoice</h3>

                        <div class="row">
                            <div class="col-md-12">

                                <!--  ==================================VALIDATION ERRORS==================================  -->
                                @if($errors->any())
                                    @foreach ($errors->all() as $error)

                                        <div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            {!!  $error !!}
                                        </div>

                                @endforeach
                            @endif
                            <!--  ==================================SESSION MESSAGES==================================  -->

                            </div>
                        </div>
                        <hr>


                        <div class="row">

                            <div class="col-md-12 text-center">
                                <p><span style="font-weight: bold;font-size: 18px;">Booking Number : </span> <span style="font-weight: bold;font-size: 18px;font-style: italic;border: 2px solid #000;border-radius: 5px;padding: 5px;">{{ $order->order_number }}</span></p>
                            </div>
                            <div class="col-md-12 text-center">
                                <p><span style="font-weight: bold;font-size: 18px;">Name : </span> <span style="font-weight: bold;font-size: 18px;font-style: italic;">{{ $order->first_name }} {{ $order->last_name }}</span></p>
                            </div>
                            <div class="col-md-12 text-center">
                                <p><span style="font-weight: bold;font-size: 18px;">Email : </span> <span style="font-weight: bold;font-size: 18px;font-style: italic;">{{ $order->email }}</span></p>
                            </div>
                            <div class="col-md-12 text-center">
                                <p><span style="font-weight: bold;font-size: 18px;">Phone : </span> <span style="font-weight: bold;font-size: 18px;font-style: italic;">{{ $order->phone }}</span></p>
                            </div>
                            <div class="col-md-12 text-center">
                                <p><span style="font-weight: bold;font-size: 18px;">Address : </span> <span style="font-weight: bold;font-size: 18px;font-style: italic;">{{ $order->address }}</span></p>
                            </div>
                            <div class="col-md-12 text-center">
                                <p><span style="font-weight: bold;font-size: 18px;">Selected Room : </span> <span style="font-weight: bold;font-size: 18px;font-style: italic;border: 2px solid #000;border-radius: 5px;padding: 5px;">{{ $order->room->name }}</span></p>
                            </div>
                            <div class="col-md-12 text-center">
                                <p><span style="font-weight: bold;font-size: 18px;">Selected Room Category : </span> <span style="font-weight: bold;font-size: 18px;font-style: italic;border: 2px solid #000;border-radius: 5px;padding: 5px;">{{ $order->room->category->name }}</span></p>
                            </div>
                            <div class="col-md-12 text-center">
                                <p><span style="font-weight: bold;font-size: 18px;">Total Price : </span> <span style="font-weight: bold;font-size: 18px;font-style: italic;border: 2px solid #000;border-radius: 5px;padding: 5px;">{{ $duration * $order->room->price }} - {{ $order->room->currency->name }}</span></p>
                            </div>
                            <div class="col-md-12 text-center">
                                <p><span style="font-weight: bold;font-size: 18px;">Selected Date : </span>
                                    @foreach($dates as $d)
                                    <span style="font-weight: bold;margin-right: 10px;line-height: 50px;font-size: 18px;font-style: italic;border: 2px solid #000;border-radius: 5px;padding: 5px;">
                                        {{ date('d-F-Y',strtotime($d->date)) }}
                                    </span>
                                    @endforeach
                                </p>
                            </div>
                            <div class="col-md-12 text-center">
                                <p><span style="font-weight: bold;font-size: 18px;">Payment Method: </span><br>
                                    @foreach($method as $m)
                                        <span style="font-weight: bold;margin-right: 10px;line-height: 50px;font-size: 18px;font-style: italic;border: 2px solid #000;border-radius: 5px;padding: 5px;">
                                            {{ $m->name }} - {{ $m->number }}
                                        </span><br>
                                    @endforeach

                                </p>
                            </div>
                            <div class="bootstrap-iso margin-bottom-10">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">

                                            {!! Form::open(['route'=>'user-booking-confirm','method'=>'post','files'=>true]) !!}

                                            <span style="color: #{{ $site_color }};font-size: 20px;font-weight: bold;border-bottom: 2px solid #{{ $site_color }};border-bottom: 2px dotted #{{ $site_color }};padding-bottom: 5px;">Payment Information</span>


                                            <input type="hidden" name="order_number" value="{{ $order->order_number }}">

                                            <div class="row" style="margin-top:15px">

                                                <div class="col-md-6">
                                                    <label>Transfer Number :</label>
                                                    <input name="transfer_number" class="form-control input-lg" type="text"
                                                           required="" placeholder="Transfer Number">
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Txt ID:</label>
                                                    <input name="txt_number" class="form-control input-lg" type="text"
                                                           required="" placeholder="Txt Id">
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:15px">
                                                <div class="col-md-6">
                                                    <label>Payment Method:</label>
                                                    <select name="method_id" id=""
                                                            class="form-control input-lg" required>
                                                        <option value="">Select One</option>
                                                        @foreach($method as $m)
                                                            <option value="{{ $m->id }}">{{ $m->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Transfer Screen Shoot :</label>
                                                    <input name="image" class="form-control input-lg" type="file">
                                                </div>


                                            </div>

                                            <div class="col_full nobottommargin" style="margin-top: 20px;">
                                                <button class="button button-3d btn-block nomargin"
                                                        id="register-form-submit"
                                                        name="register-form-submit" value="register"> <i class='fa fa-check'></i> Confirm Payment
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
    <!-- Modal for DELETE -->
    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-check'></i> Payment !</h4>
                </div>

                <div class="modal-body">
                    <strong>Are you sure you want to Payment ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('user-booking-confirm') }}" class="form-inline">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" class="abir_id" value="0">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Continue..!</button>
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