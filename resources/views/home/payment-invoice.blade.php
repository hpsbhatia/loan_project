@extends('layouts.home')

@section('content')

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">


                <div class="row">
                    <div class="col-md-8 col-md-offset-2">


                        <h3 style="text-align: center; text-transform: uppercase;">Register Successfully Completed</h3>
                        <h4 style="text-align: center; text-transform: uppercase;">Payment Here.</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <!--  ==================================SESSION MESSAGES==================================  -->
                                @if (session()->has('message'))
                                    <div class="alert alert-{!! session()->get('type')  !!} alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        {!! session()->get('message')  !!}
                                    </div>
                                @endif
                            <!--  ==================================SESSION MESSAGES==================================  -->


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
                                <p><span style="font-weight: bold;font-size: 18px;">Name : </span> <span style="font-weight: bold;font-size: 18px;font-style: italic;">{{ $member->fname }} {{ $member->lname }}</span></p>
                            </div>
                            <div class="col-md-12 text-center">
                                <p><span style="font-weight: bold;font-size: 18px;">Email : </span> <span style="font-weight: bold;font-size: 18px;font-style: italic;">{{ $member->email }}</span></p>
                            </div>
                            <div class="col-md-12 text-center">
                                <p><span style="font-weight: bold;font-size: 18px;">Phone : </span> <span style="font-weight: bold;font-size: 18px;font-style: italic;">{{ $member->phone }}</span></p>
                            </div>
                            <div class="col-md-12 text-center">
                                <p><span style="font-weight: bold;font-size: 18px;">User Name : </span> <span style="font-weight: bold;font-size: 18px;font-style: italic;">{{ $member->username }}</span></p>
                            </div>
                            <div class="col-md-12 text-center">
                                <p><span style="font-weight: bold;font-size: 18px;">Selected Plan : </span> <span style="font-weight: bold;font-size: 18px;font-style: italic;border: 2px solid #000;border-radius: 5px;padding: 5px;">{{ $member->service->name }}</span></p>
                            </div>

                            <form action="https://secure.paypal.com/uk/cgi-bin/webscr" method="post" name="paypal" id="paypal">


                                <input type="hidden" name="cmd" value="_xclick" />
                                <input type="hidden" name="business" value="{{ $paypal_email }}" />
                                <input type="hidden" name="cbt" value="{{ $site_title }}" />
                                <input type="hidden" name="currency_code" value="{{ $member->service->currency->name }}" />
                                <input type="hidden" name="quantity" value="1" />
                                <input type="hidden" name="item_name" value="{{ $member->service->name }}" />
                                <input type="hidden" name="item_total" value="1" />

                                <!-- Custom value you want to send and process back in the IPN -->
                                <input type="hidden" name="custom" value="{{ $member->code }}" />




                                <input name="amount" type="hidden" value="{{ $member->service->price }}">
                                <input type="hidden" name="return" value="{{ url('/user-login') }}"/>
                                <input type="hidden" name="cancel_return" value="{{ url('/payment-invoice/') }}{{ $member->id }}" />
                                <!-- Where to send the PayPal IPN to. -->
                                <input type="hidden" name="notify_url" value="{{ route('paypal-ipn') }}" />


                                <div class="col-md-12 text-center" style="margin-bottom: 15px;">
                                    <div class="col-sm-2 col-sm-offset-3">
                                        <span style="font-weight: bold;font-size: 18px;">Plan Price: </span>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="" value="{{ $member->service->price }} - {{ $member->service->currency->name }}" id="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center" style="margin-bottom: 15px;">
                                    <div class="col-md-8 col-md-offset-2">
                                        <button class="button button-3d btn-block nomargin" id="register-form-submit"
                                                name="register-form-submit" value="register"><i class="fa fa-paypal"></i> Pay Now
                                        </button>
                                    </div>
                                </div>

                            </form>



                        </div>
                        <br>



                    </div>


                </div><!-- row  -->


            </div>
        </div>
    </section>


@endsection