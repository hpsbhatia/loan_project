@extends('layouts.dashboard')
@section('content')


    @if(count($staff))

        <div class="row">
            <div class="col-md-12">


                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">

                            <thead>
                            <tr>
                                <th>ID#</th>
                                <th>Staff Name</th>
                                <th>Staff Email</th>
                                <th>User Name</th>
                                <th>Staff Phone</th>
                                <th>Change Password</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i=0;@endphp
                            @foreach($staff as $p)
                                @php $i++;@endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>{{ $p->username }}</td>
                                    <td>{{ $p->phone }}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm delete_button"
                                                data-toggle="modal" data-target="#DelModal"
                                                data-id="{{ $p->id }}">
                                            <i class='fa fa-exclamation-triangle'></i> Change Password
                                        </button>
                                    </td>
                                    <td>
                                        @if($p->status == 1)
                                            <a href="{{ route('staff-deactive',$p->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Active</a>
                                        @else
                                            <a href="{{ route('staff-active',$p->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> DeActive</a>
                                        @endif
                                    </td>
                                    <td>

                                        <a href="{{ route('staff-edit',$p->id) }}" class="btn purple btn-sm"><i class="fa fa-edit"></i> Edit Staff</a>

                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div><!-- ROW-->


        <div class="text-center">
            {!! $staff->render() !!}
        </div>
    @else

        <div class="text-center">
            <h3>No Data available</h3>
        </div>
    @endif

    <!-- Modal for DELETE -->
    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-check'></i> Change Password !</h4>
                </div>

                <div class="modal-body">
                    <strong>Are you sure you want Change Password ?</strong>
                </div>

                <div class="modal-footer">

                    {!! Form::open(['route'=>'staff-password-change','method'=>'post','class'=>'form-horizontal']) !!}
                    <div class="form-body">

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><b>Staff Password : </b></label>

                            <div class="col-sm-7">
                                <input name="password" value="" class="form-control input-lg" type="password" required placeholder="Staff Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><b>Staff Confirm Password : </b></label>

                            <div class="col-sm-7">
                                <input name="password_confirmation" value="" class="form-control input-lg" type="password" required placeholder="Staff Confirm Password">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-7">
                                    <input type="hidden" name="id" class="abir_id" value="0">
                                    <button type="submit" class="btn blue btn-block margin-top-10"><i class="fa fa-paper-plane"></i> Change Staff Password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}

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

