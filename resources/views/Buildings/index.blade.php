@extends('layouts.app')
@section('content')

    <div class="main-content d-flex justify-content-center align-items-center">

        <div class="container-fluid">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="card mb-30">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-between align-items-center">
                                <h4 class="font-20">Building List</h4>

                                <div class="d-flex flex-wrap">
                                    <!-- Date Picker -->
                                    <div class="dashboard-date style--six mr-20 mt-3 mt-sm-0">
                                               <span class="input-group-addon">
                                                  <img src="../../assets/img/svg/calender-color.svg" alt="" class="svg">
                                                </span>

                                        <input type="text" id="default-date" value="28 October 2019"/>
                                    </div>
                                    <!-- End Date Picker -->


                                    <!-- Dropdown Button -->
                                    <div class="dropdown-button mt-3 mt-sm-0">
                                        <button type="button" class="btn style--two orange" data-toggle="dropdown">
                                            Download <i class="icofont-simple-down"></i></button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Print</a>
                                            <a class="dropdown-item" href="#">EXL</a>
                                            <a class="dropdown-item" href="#">PDF</a>
                                        </div>
                                    </div>
                                    <!-- End Dropdown Button -->
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Invoice List Table -->
                            <table class="text-nowrap bg-white dh-table">
                                <thead>
                                <tr>
                                    <th>SL No <img src="../../assets/img/svg/table-down-arrow.svg" alt="" class="svg">
                                    </th>
                                    <th>Building <img src="../../assets/img/svg/table-down-arrow.svg" alt=""
                                                      class="svg"></th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($buildings as $building)
                                    <tr>
                                        <td>{{$building->id}}</td>
                                        <td>{{$building->name}}</td>
                                        <td><a href="invoice-details.html" class="details-btn">View Details <i
                                                    class="icofont-arrow-right"></i></a></td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <!-- End Invoice List Table -->
                        </div>
                    </div>
                </div>
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


