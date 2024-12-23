@extends('layouts.app')
@section('content')

    <div class="main-content d-flex justify-content-center align-items-center">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-6">
                    <!-- Base Control -->
                    <div class="form-element base-control mb-30">
                        <h4 class="font-20 mb-4">Instrument Add</h4>

                        <!-- Form -->
                        <form action="/instrument-create" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Name -->
                            <div class="form-group mb-4">
                                <label for="name" class="mb-2 black bold">Name</label>
                                <input type="text" class="theme-input-style" name="name" placeholder="Type Name" value="{{ old('name') }}">
                            </div>

                            <!-- Code -->
                            <div class="form-group mb-4">
                                <label for="code" class="mb-2 black bold">Code</label>
                                <input type="text" class="theme-input-style" name="code" placeholder="Type Code" value="{{ old('code') }}">
                            </div>

                            <!-- Inventory Number -->
                            <div class="form-group mb-4">
                                <label for="in" class="mb-2 black bold">Inventory Number</label>
                                <input type="text" class="theme-input-style" name="in" placeholder="Type Inventory Number" value="{{ old('in') }}">
                            </div>

                            <!-- Digital Resource -->
                            <div class="form-group mb-4">
                                <label for="dr" class="mb-2 black bold">Digital resource</label>
                                <input type="text" class="theme-input-style" name="dr" placeholder="Type Digital resource" value="{{ old('dr') }}">
                            </div>

                            <!-- Calibration Date -->
                            <div class="form-group mb-4">
                                <label class="mb-2 black bold">Calibration Date</label>
                                <div class="date datepicker dashboard-date style--three" id="datePickerExample">
                                    <span class="input-group-addon mr-0"><img src="{{asset('admin/img/svg/calender.svg')}}" alt="" class="svg"></span>
                                    <input type="text" name="default_date" placeholder="{{\Carbon\Carbon::now()}}" value="{{ old('default_date') }}"/>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="form-group mb-4">
                                        <label for="exampleSelect3" class="mb-2 black bold d-block">Building</label>
                                        <div class="custom-select style--two">
                                            <select class="theme-input-style" id="exampleSelect3" name="building_id">
                                                <option value="0">Select Building</option>
                                                @foreach($buildings as $building)
                                                    <option value="{{$building->id}}"> {{$building->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group mb-4">
                                        <label for="exampleSelect3" class="mb-2 black bold d-block">Room</label>
                                        <div class="custom-select style--two">
                                            <select class="theme-input-style" name="room_id">
                                                <option value="0">Select Room</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group mb-4">
                                        <label for="exampleSelect3" class="mb-2 black bold d-block">Place</label>
                                        <div class="custom-select style--two">
                                            <select class="theme-input-style" name="place_id">
                                                <option value="0">Select Place</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="attach-file style--two mb-4">
                                <img id="image-preview" src="{{ old('image', asset('admin/img/img-placeholder.png')) }}" class="profile-avatar" alt="">
                                <div class="upload-button">
                                    <img src="{{asset('admin/img/svg/gallery.svg')}}" alt="" class="svg mr-2">
                                    <span>Upload Photo</span>
                                    <input class="file-input" type="file" name="image" onchange="previewImage(this)">
                                </div>
                            </div>
                            <div class="content">
                                <h4 class="mb-2">Upload a Photo</h4>
                                <p class="font-12 c4">Allowed JPG, GIF or PNG. Max size <br/> of 800kB</p>
                            </div>
                            <!-- Button Group -->
                            <div class="button-group pt-2">
                                <button type="submit" class="btn long">Submit</button>
                                <button type="reset" class="link-btn bg-transparent ml-3 soft-pink">Cancel</button>
                            </div>
                            <!-- End Button Group -->
                            <!-- End Form Group -->

                        </form>
                        <!-- End Form -->
                        {{--ssss--}}

                        <!-- End Form -->
                    </div>
                    <!-- End Input Sizing -->
                </div>
                <div class="col-lg-3">
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
            jQuery(document).ready(function () {
                jQuery('select[name="building_id"]').on('change', function () {
                    var buildingID = jQuery(this).val();
                    if (buildingID) {
                        jQuery.ajax({
                            url: 'find/getRooms/' + buildingID,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                console.log(data);
                                jQuery('select[name="room_id"]').empty();
                                jQuery.each(data, function (key, value) {
                                    $('select[name="room_id"]').append('<option value="' + key + '">' + value + '</option>');
                                });
                            }
                        });
                    } else {
                        $('select[name="room_id"]').empty();
                    }
                });
            });

            jQuery(document).ready(function () {
                jQuery('select[name="room_id"]').on('change', function () {
                    var roomID = jQuery(this).val();
                    if (roomID) {
                        jQuery.ajax({
                            url: 'find/getPlaces/' + roomID,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                console.log(data);
                                jQuery('select[name="place_id"]').empty();
                                jQuery.each(data, function (key, value) {
                                    $('select[name="place_id"]').append('<option value="' + key + '">' + value + '</option>');
                                });
                            }
                        });
                    } else {
                        $('select[name="place_id"]').empty();
                    }
                });
            });

            function previewImage(input) {
                var preview = document.getElementById('image-preview');
                var file = input.files[0];
                var reader = new FileReader();

                reader.onloadend = function () {
                    preview.src = reader.result;
                }

                if (file) {
                    reader.readAsDataURL(file);
                } else {
                    preview.src = "{{ asset('admin/img/img-placeholder.png') }}";
                }
            }
        </script>
    @endpush
@endsection


