@extends('layouts.home')

@section('content')


    <!-- Slider
    ============================================= -->
    <section id="slider" class="swiper_wrapper full-screen clearfix" data-loop="true" data-autoplay="5000">

        <div class="swiper-container swiper-parent">
            <div class="swiper-wrapper">

                @foreach($slider as $s)
                    <div class="swiper-slide"
                         style="background-image: url('{{ asset('images') }}/{{ $s->image }}')">
                        <div class="container clearfix">
                            <div class="slider-caption" style="max-width: 700px;">
                                <h2 data-caption-animate="flipInX"><span
                                            style="color: #fff;">{{ $s->text }}</span></h2>
                                <p data-caption-animate="flipInX" data-caption-delay="500" style="color: #fff;"></p>


                                <b style="color: #fff;" class="hidden-sm hidden-md hidden-lg"></b>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>

        </div>

    </section><!-- #slider end -->


    <!-- Content
    ============================================= -->
    <section id="content" style="color:#{{ $site_color }}">
        <div class="content-wrap">
            <div class="container clearfix">


                <div class="row text-center">
                    <div align="center">
                        <h3 style="text-align: center; text-transform: uppercase; margin-top: 0px;">
                            <span style="color:#{{ $site_color }}"> What We Do</span></h3>
                    </div>
                    <br>
                    <div align="center">
                        <p style="font-size: 18px">{!! $top_text !!}</p>
                    </div>
                </div>


            </div>
        </div>


        <div class="row clearfix bottommargin-lg common-height">




            <div class="col-md-12 col-sm-12 dark center col-padding" style="background-color: #{{ $site_color }}; height: 326px;">
                <div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <form action="{{ route('order-search') }}" method="post" class="form-inline">
                                {!! csrf_field() !!}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" name="order_number" class="form-control input-lg" style="background: #fff" id="exampleInputName2" placeholder="Order Number" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control input-lg" style="background: #fff" id="exampleInputName2" placeholder="Your Email" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-search"></i> Search Order</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @if($order != null)
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 margin-top-10  col-sm-12 dark center col-padding" style="background-color: #{{ $site_color }}; margin-top: 60px; margin-bottom: -30px;">
                        <table class="table table-bordered table-striped-table-hover" border="2">
                            <thead>
                            <tr>
                                <th style="text-align: center">Order Number</th>
                                <th style="text-align: center">User Name</th>
                                <th style="text-align: center">User Email</th>
                                <th style="text-align: center">Process Step</th>
                                <th style="text-align: center">Payment Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $order->order_number }}</td>
                                <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>
                                    <span style="border: 2px solid #fff;padding: 5px;border-radius: 5px">{{ $order->process->name }}</span>
                                </td>
                                <td>
                                    @if($order->payment_status == 1)
                                        <span style="border: 2px solid #fff;padding: 5px;border-radius: 5px">Paid</span>
                                    @else
                                        <span style="border: 2px solid #fff;padding: 5px;border-radius: 5px">UnPaid</span>
                                    @endif

                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
            <div class="text-center">

                <h4 style="margin-top: 20px;font-style: italic;color: red">No Order Found.</h4>
            </div>
            @endif


        </div>


        <div class="content-wrap">
            <div class="container clearfix">


                <h3 style="text-align: center; text-transform: uppercase; margin-top: -40px;">
                    <span style="color:#{{ $site_color }}"> Select a package below</span></h3>

                <div class="pricing bottommargin clearfix">

                    @foreach($package as $p)
                        <div class="col-md-4">
                            <div class="pricing-box"
                                 style="border-radius: 8px !important;">
                                <div class="pricing-title">
                                    <h3>{{ $p->name }}</h3>
                                </div>
                                <div class="pricing-price">
                                    <span class="price-unit"><span style="font-size: 19px">{{ $p->currency->name }}</span>-{{ $p->price }}</span>
                                </div>
                                <div class="pricing-features">
                                    <ul>
                                        <li>
                                            <p><i class="fa fa-check"></i> {{ $p->description1 }}</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check"></i> {{ $p->description2 }}</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check"></i> {{ $p->description3 }}</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check"></i> {{ $p->description4 }}</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check"></i> {{ $p->description5 }}</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check"></i> {{ $p->description6 }}</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check"></i>
                                                @if($p->description7 != null)
                                                    {{ $p->description7 }}
                                                @else
                                                    {{ "-"}}
                                                @endif
                                            </p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check"></i>
                                                @if($p->description8 != null)
                                                    {{ $p->description8 }}
                                                @else
                                                    <i class="fa fa-minus"></i>
                                                @endif
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                @if($p->description9 != null)
                                                    <i class="fa fa-check"></i>
                                                    {{ $p->description9 }}
                                                @else
                                                    <i class="fa fa-minus"></i>
                                                @endif
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                @if($p->description10 != null)
                                                    {{ $p->description10 }}
                                                @else
                                                    <i class="fa fa-minus"></i>
                                                @endif
                                            </p>
                                        </li>

                                    </ul>
                                </div>

                                <div class="pricing-action">
                                    <strong style="color: #{{ $site_color }}; text-transform: uppercase;">


                                        <div id="wc1"></div>

                                        <a href="{{ route('user-order',$p->id) }}" class="btn btn-block btn-lg"
                                           style="color: #fff; background: #{{ $site_color }}">Order Now</a> </strong>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                <h3 style="text-align: center; text-transform: uppercase; margin-top: 40px;">
                    <span style="color:#{{ $site_color }}"> TESTIMONIALS </span></h3>

                <ul class="testimonials-grid grid-3 clearfix">

                    @foreach($test as $t)
                        <li style="height: 198px;">
                            <div class="testimonial" style="color:#{{ $site_color }}">
                                <div class="testi-content">
                                    <p style="text-transform: lowercase; font-weight: normal;">{{ $t->description }}</p>
                                    <div class="testi-meta">
                                        {{ $t->name }}
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach


                </ul>


            </div>
        </div>
    </section><!-- #content end -->


@endsection
