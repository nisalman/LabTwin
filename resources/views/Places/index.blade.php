@extends('layouts.app')
@section('content')


    <div class="main-content d-flex justify-content-center align-items-center">

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-0 col-lg-3"></div>
                <div class="col-sm-12 col-lg-6">
                    <div class="card mb-30">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-between align-items-center">
                                <h4 class="font-20">Places List</h4>

                                <div class="d-flex flex-wrap">
                                    <div class="dropdown-button mt-3 mt-sm-0">
                                        <a href="/place/create"><button class="btn btn-sm btn-info"><i class="icofont-plus"></i></button></a>
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
                                    <th>Place</th>
                                    <th>Room</th>
                                    <th>Building</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($places as $key=>$place)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$place->name}}</td>
                                    <td>{{$place->room->name}}</td>
                                    <td>{{$place->room->building->name}}</td>
                                    <td><a href="/place/edit/{{$place->id}}"><button style="background-color: #1e7e34" class="btn btn-sm btn-info"><i class="icofont-edit"></i></button></a>
                                        <a href="/place/delete/{{$place->id}}"><button style="background-color: #ee3131" class="btn btn-info"><i class="icofont-trash"></i></button></a></td>
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


