@extends('layouts.home')

@section('content')

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">


                <div class="row">
                    <div class="col-md-8 col-md-offset-2">


                        <h3 style="text-align: center;margin-bottom: 0px; text-transform: uppercase;">Booking Confirmation</h3>

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
                                <p><span style="font-weight: bold;font-size: 18px;">Selected Date : </span>
                                    @php $i=0; @endphp
                                    @foreach($dates as $d)
                                        @php $i++ @endphp
                                        <span style="font-weight: bold;margin-right: 10px;line-height: 50px;font-size: 18px;font-style: italic;border: 2px solid #000;border-radius: 5px;padding: 5px;">
                                        {{ date('d-F-Y',strtotime($d->date)) }}
                                    </span>
                                    @endforeach
                                </p>
                            </div>
                            <div class="col-md-12 text-center">
                                <p><span style="font-weight: bold;font-size: 18px;">Total Price : </span> <span style="font-weight: bold;font-size: 18px;font-style: italic;border: 2px solid #000;border-radius: 5px;padding: 5px;">{{ $i * $order->room->price }} - {{ $order->room->currency->name }}</span></p>
                            </div>
                            <div class="col-md-8 col-lg-offset-2 text-center">
                                <button type="submit" onclick="window.print();" class="btn btn-danger btn-block"><i class="fa fa-print"></i> Print This Page</button>
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
        window.onbeforeunload = function (e) {
            e = e || window.event;

// For IE and Firefox prior to version 4
            if (e) {
                e.returnValue = 'Sure?';
            }

// For Safari
            return 'Sure?';
        };
    </script>


@endsection
