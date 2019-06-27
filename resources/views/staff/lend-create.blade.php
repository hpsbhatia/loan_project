@extends('layouts.staff')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="bootstrap-iso margin-bottom-10">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">

                                {!! Form::open(['method'=>'post','files'=>true]) !!}

                                <span style="color: #000;font-size: 20px;font-weight: bold;border-bottom: 2px solid #000;border-bottom: 2px dotted #000;padding-bottom: 5px;">Select Loan Package</span>
                                <div class="row" style="margin-top: 15px">
                                    <div class="col-md-12">
                                        <label>Select Loan Package:</label>
                                        <select name="package_id" id="" class="form-control input-lg" required>
                                            <option value="">Select One</option>
                                            @foreach($package as $s)
                                                <option value="{{ $s->id }}">{{ $s->name }} - {{ $s->amount }} {{ $s->currency->name }} - {{ $s->rate }} {{ $s->currency->name }} - {{ $s->installment }} Installment</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <input type="hidden" name="staff_id" value="{{ Auth::guard('staff')->user()->id }}">
                                <hr>

                                <span style="color: #000;font-size: 20px;font-weight: bold;border-bottom: 2px solid #000;border-bottom: 2px dotted #000;padding-bottom: 5px;">Personal Information</span>

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
                                <div class="row" style="margin-top:15px">

                                    <div class="col-md-6">
                                        <label>Monthly Salary:</label>
                                        <input name="salary" class="form-control input-lg" type="text"
                                               required="" placeholder="Monthly Salary">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Additional Income:</label>
                                        <input name="other_income" class="form-control input-lg" type="text"
                                               required="" placeholder="Additional Income">
                                    </div>

                                </div>
                                <br>
                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Spouse Name:</label>
                                        <input name="spouse_name" class="form-control input-lg" type="text"
                                               placeholder="Spouse Name">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Date Of Birth :</label>
                                        <input type="text" class="form-control input-lg" name="birth_date" id="date1"
                                               placeholder="dd-mm-yyyy" required>
                                    </div>

                                </div>
                                <div class="row" style="margin-top:15px">

                                    <div class="col-md-6">
                                        <label>Spouse Monthly Salary:</label>
                                        <input name="salary_spouse" class="form-control input-lg" type="text"
                                               required="" placeholder="Spouse Monthly Salary">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Spouse Additional Income:</label>
                                        <input name="other_income_spouse" class="form-control input-lg" type="text"
                                               required="" placeholder="Spouse Additional Income">
                                    </div>

                                </div>
                                <br>
                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Email Address:</label>
                                        <input id="email" name="email_name" class="form-control input-lg"
                                               type="email"
                                               required="" placeholder="Email Address">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Phone Number:</label>
                                        <input id="phone_number" name="phone_number" class="form-control input-lg" type="text"
                                               required="" placeholder="Phone Number">
                                    </div>

                                </div>
                                <br>

                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Father Name:</label>
                                        <input name="father_name" class="form-control input-lg" type="text"
                                               required="" placeholder="Father Name">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Mother Name:</label>
                                        <input name="mother_name" class="form-control input-lg" type="text"
                                               required="" placeholder="Mother Name">
                                    </div>

                                </div>

                                <br>

                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Present Address:</label>
                                        <textarea name="present_address" id="" cols="30" rows="5"
                                                  class="input-lg form-control" required
                                                  placeholder="Present Address"></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Permanent Address:</label>
                                        <textarea name="permanent_address" id="" cols="30" rows="5"
                                                  class="input-lg form-control" required
                                                  placeholder="Permanent Address"></textarea>
                                    </div>

                                </div>

                                <hr>
                                <span style="font-size: 20px;font-weight: bold;border-bottom: 2px solid #ddd;border-bottom: 2px dotted #ddd;padding-bottom: 5px;">Emergency Contact</span>


                                <div class="row" style="margin-top: 15px">

                                    <div class="col-md-6">
                                        <label>Name:</label>
                                        <input name="emergency_name" class="form-control input-lg" type="text"
                                               required="" placeholder="Name">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Relationship:</label>
                                        <input name="emergency_relationship" class="form-control input-lg" type="text"
                                               required="" placeholder="Relationship">
                                    </div>


                                </div>
                                <br>
                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Phone:</label>
                                        <input name="emergency_phone" class="form-control input-lg" type="text"
                                               required="" placeholder="Emergency Phone">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Address:</label>
                                        <textarea name="emergency_address" id="" cols="30" rows="1"
                                                  class="input-lg form-control" required
                                                  placeholder="Emergency Address"></textarea>
                                    </div>


                                </div>
                                <hr>

                                <span style="color: #000;font-size: 20px;font-weight: bold;border-bottom: 2px solid #000;border-bottom: 2px dotted #000;padding-bottom: 5px;">Requirement Files</span>

                                <div class="row" style="margin-top: 15px">

                                    <div class="col-md-12">
                                        <label>User Picture:</label>
                                        <input type="file" name="loaner_image" id="" class="form-control input-lg" required>
                                    </div>

                                </div>
                                <br>
                                <div class="row" style="margin-top: 15px">

                                    <div class="col-md-12">
                                        <label>National ID Card:</label>
                                        <input type="file" name="nid_image" id="" class="form-control input-lg" required>
                                    </div>

                                </div>
                                <br>

                                <div class="col_full nobottommargin">
                                    <button class="button btn btn-primary btn-block margin-top-10 nomargin"
                                            id="register-form-submit"
                                            name="register-form-submit" value="register"><i class="fa fa-send"></i> Confirm & Next Step
                                    </button>
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div><!---ROW-->


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

