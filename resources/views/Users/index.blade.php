@extends('layouts.app')
@section('content')

    <div class="main-content d-flex justify-content-center align-items-center">

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-0 col-lg-3"></div>
                <div class="card mb-30">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-center">
                            <h4 class="font-20">User List</h4>

                            <div class="d-flex flex-wrap">
                                <div class="dropdown-button mt-3 mt-sm-0">
                                    <a href="/user/create">
                                        <button class="btn btn-sm btn-info"><i class="icofont-plus"></i></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Invoice List Table -->
                        <table class="text-nowrap bg-white dh-table">
                            <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th>Role</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $key=>$user)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img style="height: 70px; width: 70px" src="uploads/profile/{{$user->image}}"></td>
                                    <td>{{$user->name.' '.$user->lname}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->position}}</td>
                                    <td><span class="badge badge-primary">{{$user->type}}</span></td>
                                    <td>{{$user->phone}}</td>
                                    <td><a href="/user/view/{{$user->id}}">
                                            <button style="background-color: #009dff" class="btn btn-sm btn-info"><i
                                                        class="icofont-eye"></i></button>
                                        </a>
                                        <a href="/user/edit/{{$user->id}}">
                                            <button style="background-color: #1e7e34" class="btn btn-sm btn-info"><i
                                                        class="icofont-edit"></i></button>
                                        </a>
                                        <a href="/user/delete/{{$user->id}}">
                                            <button style="background-color: #ee3131" class="btn btn-info"><i
                                                        class="icofont-trash"></i></button>
                                        </a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- End Invoice List Table -->
                    </div>
                </div>
            </div>
            <div class="col-sm-0 col-lg-3"></div>
        </div>
    </div>


    <!-- End Main Content -->
    @push('body-scripts')

        <script src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <script src="{{asset('admin/plugins/datepicker/datepicker.min.js')}}"></script>
        <!-- ======= BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
        <script src="{{asset('admin/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{asset('admin/plugins/bootstrap-datepicker/custom-datepicker.js')}}"></script>
        <!-- ======= End BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
        <script type="text/javascript">
        </script>
    @endpush
@endsection


