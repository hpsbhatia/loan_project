@extends('layouts.dashboard')

@section('content')


        <div class="col-md-12">

            <div class="col-md-3">
                <div class="dashboard-stat green">
                    <div class="visual">
                        <i class="fa fa-list"></i>
                    </div>
                    <div class="details">
                        <div class="number">{{ $total_loner }}</div>
                        <div class="desc">Total Loner</div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="dashboard-stat yellow">
                    <div class="visual">
                        <i class="fa fa-folder"></i>
                    </div>
                    <div class="details">
                        <div class="number">{{ $total_depositor }}</div>
                        <div class="desc">Total Depositor</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dashboard-stat green">
                    <div class="visual">
                        <i class="fa fa-list"></i>
                    </div>
                    <div class="details">
                        <div class="number">{{ $total_loan}}</div>
                        <div class="desc">Total Loan Package</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dashboard-stat yellow">
                    <div class="visual">
                        <i class="fa fa-folder"></i>
                    </div>
                    <div class="details">
                        <div class="number">{{ $total_deposit }}</div>
                        <div class="desc">Total Deposit Package</div>
                    </div>
                </div>
            </div>

        </div>


@endsection