@extends('layouts.app')
@section('content')

        <!-- Main Content -->
        <div class="main-content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- User Profile Image -->
                            <div class="user-profile-img">
                                <div class="cover-img">
                                    <img src="{{asset('admin/img/media/fcp.jpg')}}" class="w-100" alt="">

                                    <!-- Upload Photo -->
                                    <div class="upload-button">
                                        <img src="{{asset('admin/img/svg/gallery.svg')}}" alt="" class="svg mr-2">
                                    </div>
                                    <!-- End Upload Photo -->
                                </div>
                            </div>
                            <!-- End User Profile Image -->
                        </div>
                        <div class="mx-2 mx-lg-4 mx-xl-5">
                            <div class="card mt-1">
                                <!-- User Profile Nav -->
                                <div class="user-profile-nav d-flex justify-content-xl-between align-items-xl-center flex-column flex-xl-row">
                                    <!-- Profile Info -->
                                    <div class="profile-info d-flex align-items-center">
                                        <div class="profile-pic mr-3">
                                            <img src="{{asset('uploads/profile/'.$user->image)}}" alt="">
                                        </div>

                                        <div>
                                            <h3>{{$user->name.' '.$user->lname}}</h3>
                                            <p class="font-14">{{$user->position}}</p>
                                        </div>
                                    </div>
                                    <!-- End Profile Info -->

                                    <div class="d-flex align-items-center mt-3 mt-xl-0">
                                        <ul class="nav profile-nav-tabs">
                                            <li>
                                                <a class="active pr-0 pl-2 pl-xl-30">
                                                    <span class="chat">
                                                        <img src="{{asset('admin/img/svg/writing.svg')}}" alt="" class="svg">
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="conncetion" href="connection.html">
                                                    <div class="btn-circle mr-20">
                                                        <img src="{{asset('admin/img/svg/writing.svg')}}" alt="" class="svg">
                                                    </div>
                                                    <div class="font-14">
                                                        <h4>154</h4>
                                                        <p class="font-14 text_color">Instrument Taken</p>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>

                                    </div>

                                </div>
                                <!-- End User Profile Nav -->
                            </div>

                            <div class="mt-30">

                                <!-- Card -->
                                <div class="card">
                                    <div class="p-30">
                                        <div class="about-myself mt-2 pb-2">
                                            <h4 class="mb-3">About Myself</h4>
                                            <p>{{$user->about}}</p>
                                        </div>


                                        <div class="row mt-5">
                                            <div class="col-md-3">
                                                <nav>
                                                    <div class="nav flex-md-column about-nav-tab">

                                                        <a class="active"  id="nav-basic-tab" data-toggle="tab" href="#nav-basic">Contact And Basic Info</a>

                                                        <a id="nav-work-tab" data-toggle="tab" href="#nav-instrument">Instrument Responsible for</a>

                                                    </div>
                                                </nav>
                                            </div>

                                            <div class="col-md-9">
                                                <div class="tab-content about-tab-content pl-md-5 mt-4 mt-md-0">
                                                    <div class="tab-pane fade" id="nav-instrument" role="tabpanel">
                                                        <h4 class="mb-3">Instrument Responsible for</h4>
                                                    </div>
                                                    <div class="tab-pane fade show active" id="nav-basic" role="tabpanel">
                                                        <!-- Personal Info -->
                                                        <div class="personal-info">
                                                            <h4 class="mb-3">Personal Information</h4>

                                                            <ul class="info-list list-unstyled">
                                                                <li><span>First Name</span> {{$user->name}} </li>
                                                                <li><span>Last Name</span> {{$user->lname}}</li>
                                                                <li><span>age</span> {{$user->age}}</li>
                                                                <li><span>Position</span> {{$user->position}}</li>
                                                                <li><span>Address</span> {{$user->address}}</li>
                                                                <li><span>Phone</span> <a href="tel:0021364545">{{$user->phone}}</a></li>
                                                                <li><span>Email</span> <a href="mailto:abrilakh@gmail.com">{{$user->email}}</a></li>
                                                            </ul>
                                                        </div>
                                                        <!-- End Personal Info -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Card -->
                            </div>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Work Experience</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete Work Experience?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn long" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn long">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteConfirmEducationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel2">Delete School Experience</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete School Experience?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn long" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn long">Delete</button>
                                    </div>
                                </div>
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