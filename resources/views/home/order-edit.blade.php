@extends('layouts.home')

@section('content')

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">


                <div class="row">
                    <div class="col-md-10 col-md-offset-1">


                        <h3 style="text-align: center;color: #{{ $site_color }}; text-transform: uppercase;">Edit your Details</h3>
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


                        <div class="bootstrap-iso margin-bottom-10">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">

                                        {!! Form::model($order,['route'=>['order-update',$order->id],'method'=>'put','files'=>true]) !!}

                                        <span style="color: #{{ $site_color }};font-size: 20px;font-weight: bold;border-bottom: 2px solid #{{ $site_color }};border-bottom: 2px dotted #{{ $site_color }};padding-bottom: 5px;">Personal Information</span>

                                        <div class="row" style="margin-top:15px">

                                            <div class="col-md-6">
                                                <label>First Name:</label>
                                                <input name="first_name" class="form-control input-lg" type="text"
                                                       required="" value="{{ $order->first_name }}" placeholder="First Name">
                                            </div>

                                            <div class="col-md-6">
                                                <label>Last Name:</label>
                                                <input name="last_name" class="form-control input-lg" type="text"
                                                       required="" value="{{ $order->last_name }}"  placeholder="Last Name">
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <label>Spouse Name:</label>
                                                <input name="spouse_name" class="form-control input-lg" type="text"
                                                       required="" value="{{ $order->spouse_name }}"  placeholder="Spouse Name">
                                            </div>

                                            <div class="col-md-6">
                                                <label>Date Of Birth :</label>
                                                <input type="text" class="form-control input-lg" name="birth_date" id="date1"
                                                       placeholder="dd-mm-yyyy" value="{{ $order->birth_date }}"  required>
                                            </div>

                                        </div>
                                        <br>


                                        <div class="row">

                                            <div class="col-md-6">
                                                <label>Email Address:</label>
                                                <input id="email" name="email" class="form-control input-lg"
                                                       type="email"
                                                       required="" value="{{ $order->email }}"  placeholder="Email Address">
                                                <div id="emailerr"></div>
                                            </div>

                                            <div class="col-md-6">
                                                <label>Phone Number:</label>
                                                <input id="phone" name="phone" class="form-control input-lg" type="text"
                                                       required="" value="{{ $order->phone }}"
                                                       maxlength="11" placeholder="Phone Number">
                                                <div id="phoneerr"></div>
                                            </div>

                                        </div>
                                        <br>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <label>Father Name:</label>
                                                <input name="father_name" class="form-control input-lg" type="text"
                                                       required="" value="{{ $order->father_name }}"  placeholder="Father Name">
                                            </div>

                                            <div class="col-md-6">
                                                <label>Mother Name:</label>
                                                <input name="mother_name" class="form-control input-lg" type="text"
                                                       required="" value="{{ $order->mother_name }}"  placeholder="Mother Name">
                                            </div>

                                        </div>

                                        <br>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <label>Present Address:</label>
                                                <textarea name="present_address" id="" cols="30" rows="5"
                                                          class="input-lg form-control"   required
                                                          placeholder="Present Address">{{ $order->present_address }}</textarea>
                                            </div>

                                            <div class="col-md-6">
                                                <label>Permanent Address:</label>
                                                <textarea name="permanent_address" id="" cols="30" rows="5"
                                                          class="input-lg form-control"   required
                                                          placeholder="Permanent Address">{{ $order->permanent_address }}</textarea>
                                            </div>

                                        </div>

                                        <br>
                                        <span style="color: #{{ $site_color }};font-size: 20px;font-weight: bold;border-bottom: 2px solid #{{ $site_color }};border-bottom: 2px dotted #{{ $site_color }};padding-bottom: 5px;">Emergency Contact</span>


                                        <div class="row" style="margin-top: 15px">

                                            <div class="col-md-6">
                                                <label>Name:</label>
                                                <input name="emergency_name" class="form-control input-lg" type="text"
                                                       required="" value="{{ $order->emergency_name }}"  placeholder="Name">
                                            </div>

                                            <div class="col-md-6">
                                                <label>Relationship:</label>
                                                <input name="emergency_relationship" class="form-control input-lg" type="text"
                                                       required="" value="{{ $order->emergency_relationship }}"  placeholder="Relationship">
                                            </div>


                                        </div>
                                        <br>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <label>Phone:</label>
                                                <input name="emergency_phone" class="form-control input-lg" type="text"
                                                       required="" value="{{ $order->emergency_phone }}"  placeholder="Emergency Phone">
                                            </div>

                                            <div class="col-md-6">
                                                <label>Address:</label>
                                                <textarea name="emergency_address" id="" cols="30" rows="1"
                                                          class="input-lg form-control" required
                                                          placeholder="Emergency Address">{{ $order->emergency_address }}</textarea>
                                            </div>


                                        </div>
                                        <br>

                                        <span style="color: #{{ $site_color }};font-size: 20px;font-weight: bold;border-bottom: 2px solid #{{ $site_color }};border-bottom: 2px dotted #{{ $site_color }};padding-bottom: 5px;">Requirement Files</span>
                                        <div class="row" style="margin-top: 15px">

                                            <div class="col-md-12">
                                                <label>National ID Card:</label>
                                                <img src="{{ asset('upload') }}/{{ $order->nid_image }}" alt="">
                                            </div>

                                        </div>
                                        <br>

                                        <div class="row" style="margin-top: 15px">

                                            <div class="col-md-12">
                                                <label>Change National ID Card:</label>
                                                <input type="file" name="nid_image" id="" class="form-control input-lg">
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row" style="margin-top: 10px">

                                            <div class="col-md-12">
                                                <label>Passport Image:</label>
                                                <img src="{{ asset('upload') }}/{{ $order->passport_image }}" alt="">
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row" style="margin-top: 10px">

                                            <div class="col-md-12">
                                                <label>change Passport Image:</label>
                                                <input type="file" name="passport_image" id="" class="form-control input-lg">
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row" style="margin-top: 10px">

                                            <div class="col-md-12">
                                                <label>Another Passport:</label>
                                                <textarea name="another_passport" id="" cols="30" rows="3"
                                                          class="input-lg form-control" placeholder="If You Have Another Passport">{{ $order->another_passport }}</textarea>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row" style="margin-top: 10px">

                                            <div class="col-md-12">
                                                <label>Utility Image:</label>
                                                <img src="{{ asset('upload') }}/{{ $order->utility_image }}" alt="">
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row" style="margin-top: 10px">

                                            <div class="col-md-12">
                                                <label>Change Utility Image:</label>
                                                <input type="file" name="utility_image" id="" class="form-control input-lg" >
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row" style="margin-top: 10px">

                                            <div class="col-md-12">
                                                <label>Other:</label>
                                                <input type="file" name="other_image" id="" class="form-control input-lg">
                                            </div>

                                        </div>
                                        <br>
                                        <span style="color: #{{ $site_color }};font-size: 20px;font-weight: bold;border-bottom: 2px solid #{{ $site_color }};border-bottom: 2px dotted #{{ $site_color }};padding-bottom: 5px;">Select Plan</span>
                                        <div class="row" style="margin-top: 15px">

                                            <div class="col-md-12">
                                                <label>Plan Name:</label>
                                                <select name="service_id" id="" class="form-control input-lg">
                                                    @foreach($plan as $p)
                                                        @if($p->id == $order->service_id)
                                                            <option value="{{ $p->id }}" selected>{{ $p->name }} - {{ $p->price }} {{ $p->currency->name }}</option>
                                                        @else
                                                            <option value="{{ $p->id }}">{{ $p->name }} - {{ $p->price }} {{ $p->currency->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <br>
                                        

                                        <div class="col_full nobottommargin">
                                            <button class="button button-3d btn-block nomargin"
                                                    id="register-form-submit"
                                                    name="register-form-submit" value="register">Update Details & Next Step
                                            </button>
                                        </div>

                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div><!-- row  -->


            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('date-picker/bootstrap-datepicker.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('date-picker/bootstrap-datepicker3.css') }}"/>


    <script>
        $(document).ready(function () {
            var date_input = $('input[name="birth_date"]'); //our date input has the name "date"
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "input";
            var options = {
                format: 'dd-mm-yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            };
            date_input.datepicker(options);
        })
    </script>

@endsection