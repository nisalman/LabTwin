
@extends('layouts.app')
@section('content')

    <!-- ======= BEGIN PAGE LEVEL PLUGINS STYLES ======= -->

    <!-- ======= END BEGIN PAGE LEVEL PLUGINS STYLES ======= -->

    <!-- Main Content -->
    <div class="main-content d-flex justify-content-center align-items-center">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-6">
                    <!-- Base Control -->
                    <div class="form-element base-control mb-30">
                        <h4 class="font-20 mb-4">Base Control</h4>

                        <!-- Form -->
                        <form action="/place/update" method="POST">
                            @csrf
                            <!-- Form Group -->
                            <div class="form-group mb-4">
                                <label for="name" class="mb-2 black bold">Name</label>
                                <input type="text" class="theme-input-style" name="name" value="{{$place->name}}" placeholder="Type Name">
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
                                                    <option {{$building->id == $place->room->building->id ? 'selected' : '' }} value="{{ $building->id }}">{{ $building->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group mb-4">
                                        <label for="exampleSelect3" class="mb-2 black bold d-block">Room</label>
                                        <div class="custom-select style--two">
                                            <select class="theme-input-style" id="exampleSelect3" name="building_id">
                                            <option value="0">Select Rooms</option>
                                            @foreach($rooms as $room)
                                                <option {{$room->id == $place->room->id ? 'selected' : '' }} value="{{ $room->id }}">{{ $room->name }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

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
                    console.log(buildingID);
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
        </script>
    @endpush
@endsection


