@extends('layouts.home')
@section('style')



@endsection
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


        <div class="row clearfix bottommargin-lg">




            <div class="col-md-12 col-sm-12 center col-padding" style="background-color: #{{ $site_color }}; height: 120px; !important;">
                <div>
                    <div class="row">
                        <div class="col-md-11 col-md-offset-1" style="margin-top: 15px;">
                            <form action="{{ route('search-schedule') }}" method="post" class="form-inline">
                                {!! csrf_field() !!}
                                <div class="col-md-3 col-md-offset-1">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input type="text" name="number" class="form-control input-lg" placeholder="Enter Loan Or Deposit Number" style="background: #fff;width: 285px;" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control input-lg" placeholder="Enter Email Address" style="background: #fff;width: 250px;" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default btn-block btn-lg"><i class="fa fa-search" aria-hidden="true"></i> View Log Sheet</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="content-wrap">
            <div class="container clearfix">


                <h3 style="text-align: center; text-transform: uppercase; margin-top: -40px;">
                    <span style="color:#{{ $site_color }}"> Loan Package Below</span></h3>

                <div class="pricing bottommargin clearfix">

                    @foreach($loan as $p)
                    <div class="col-md-3">
                        <div class="pricing-box"
                             style="border-radius: 8px !important;">
                            <div class="pricing-title">
                                <h3>{{ $p->name }}</h3>
                            </div>
                            <div class="pricing-price">
                                <span class="price-unit">{{ $p->amount }} <span style="font-size: 19px"> - {{ $p->currency->name }} </span></span>
                            </div>
                            <div class="pricing-features">
                                <ul>
                                    <li>
                                        <p><i class="fa fa-check"></i> {{ $p->percentage }}% - Interest</p>
                                    </li>
                                    <li>
                                        <p><i class="fa fa-check"></i> {{ $p->installment }} - Installment</p>
                                    </li>
                                    <li>
                                        <p><i class="fa fa-check"></i> {{ $p->rate }} - {{ $p->currency->name }} Par Installment</p>
                                    </li>
                                    <li>
                                        <p><i class="fa fa-check"></i> {{ $p->type->name }} - Installment Type</p>
                                    </li>
                                    <li>
                                        <p><i class="fa fa-check"></i> {{ $p->fine }} - {{ $p->currency->name }} - Fine Par Installment</p>
                                    </li>

                                </ul>
                            </div>

                            <div class="pricing-action">
                                <strong style="color: #{{ $site_color }}; text-transform: uppercase;">


                                    <div id="wc1"></div>

                                    <a href="{{ route('contact-us') }}" class="btn btn-block btn-lg"
                                       style="color: #fff; text-transform: none;  background: #{{ $site_color }}">Contact Now</a> </strong>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>


                <h3 style="text-align: center; text-transform: uppercase; margin-top: 40px;">
                    <span style="color:#{{ $site_color }}"> Deposit Package Below</span></h3>

                <div class="pricing bottommargin clearfix">

                    @foreach($deposit as $p)
                        <div class="col-md-3">
                            <div class="pricing-box"
                                 style="border-radius: 8px !important;">
                                <div class="pricing-title">
                                    <h3>{{ $p->name }}</h3>
                                </div>
                                <div class="pricing-price">
                                    <span class="price-unit">{{ $p->amount }} <span style="font-size: 19px"> - {{ $p->currency->name }} </span></span>
                                </div>
                                <div class="pricing-features">
                                    <ul>
                                        <li>
                                            <p><i class="fa fa-check"></i> {{ $p->percentage }}% - Interest</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check"></i> {{ $p->installment }} - Installment</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check"></i> {{ $p->rate }} - {{ $p->currency->name }} Par Installment</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check"></i> {{ $p->type->name }} - Installment Type</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check"></i> {{ $p->fine }} - {{ $p->currency->name }} - Fine Par Installment</p>
                                        </li>

                                    </ul>
                                </div>

                                <div class="pricing-action">
                                    <strong style="color: #{{ $site_color }}; text-transform: uppercase;">


                                        <div id="wc1"></div>

                                        <a href="{{ route('contact-us') }}" class="btn btn-block btn-lg"
                                           style="color: #fff; text-transform: none;  background: #{{ $site_color }}">Contact Now</a> </strong>
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
                                <p style="text-transform: lowercase; font-weight: normal;">{{ substr($t->description,0,180) }}</p>
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
@section('scripts')


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


