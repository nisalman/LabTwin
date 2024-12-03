@extends('layouts.app')
@section('content')

    <div class="row ">

        <div class="col-12">
            <!-- Base Control -->
            <div class="form-element base-control mb-30">
                <h4 class="font-20 mb-4">Messplatz Add</h4>

                <!-- Form -->
                <form action="{{ route('messplatz.store') }}" method="POST">
                @csrf
                    <!-- Name -->
                    <div class="form-group mb-4">
                        <label for="name" class="mb-2 black bold">Name</label>
                        <input type="hidden" name="instrument_id"
                               value="15">
                        <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                        <input type="text" class="theme-input-style" name="name" placeholder="Type Name"
                               value="{{ old('name') }}">
                    </div>

                    <!-- Form Group -->
                    <div class="row">
                        <div class="col-xl-4 col-sm-4">
                            <div class="form-group mb-4">
                                <label for="exampleSelect3"
                                       class="mb-2 black bold d-block">Building</label>
                                <div class="custom-select style--two">
                                    <select class="theme-input-style" id="building_id"
                                            name="building_id">
                                        <option value="0">Select Building</option>
                                        @foreach($buildings as $building)
                                            <option value="{{$building->id}}"> {{$building->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-4">
                            <div class="form-group mb-4">
                                <label for="exampleSelect3" class="mb-2 black bold d-block">Room</label>
                                <div class="custom-select style--two">
                                    <select class="theme-input-style" id="room_id"
                                            name="room_id">
                                        <option value="0">Select Rooms</option>
                                        @foreach($rooms as $room)
                                            <option value="{{$room->id}}"> {{$room->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-4">
                            <div class="form-group mb-4">
                                <label for="exampleSelect3"
                                       class="mb-2 black bold d-block">Place</label>
                                <div class="custom-select style--two">
                                    <select class="theme-input-style" name="place_id" id="place_id">
                                        <option value="0">Select Place</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Button Group -->
                    <div class="button-group pt-2">
                        <button type="submit" class="btn long">Submit</button>
                        <button type="reset" class="link-btn bg-transparent ml-3 soft-pink">Cancel
                        </button>
                        <button type="button" id="resetButton" class="link-btn bg-transparent ml-3 soft-pink">Reset
                            Dropdowns
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- End Main Content -->
    @push('body-scripts')

        <script src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

        <script type="text/javascript">
            jQuery(document).ready(function () {
                jQuery('select[name="building_id"]').on('change', function () {
                    $('select[name="place_id"]').empty().append('<option value="0">Select Place</option>');
                    var buildingID = jQuery(this).val();

                    if (buildingID) {
                        jQuery.ajax({
                            url: 'getRooms/' + buildingID,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                console.log(data);
                                jQuery('select[name="room_id"]').empty().append('<option value="0">Select Room</option>');

                                if (Array.isArray(data) && data.length === 0) {
                                    $('select[name="room_id"]').append('<option value="0">No room assigned</option>');
                                } else {
                                    jQuery.each(data, function (key, value) {
                                        $('select[name="room_id"]').append('<option value="' + key + '">' + value + '</option>');
                                    });
                                }
                            },
                            error: function (xhr, status, error) {
                                console.error("Error:", error);
                                alert("An error occurred. Please try again.");
                            }
                        });
                    } else {
                        $('select[name="room_id"]').empty().append('<option value="0">Select Room</option>');
                    }
                });

                jQuery('select[name="room_id"]').on('change', function () {
                    var roomID = jQuery(this).val();

                    if (roomID) {
                        jQuery.ajax({
                            url: 'getPlaces/' + roomID,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                console.log(data);
                                jQuery('select[name="place_id"]').empty().append('<option value="0">Select Place</option>');

                                if (Array.isArray(data) && data.length === 0) {
                                    $('select[name="place_id"]').append('<option value="0">No place assigned</option>');
                                } else {
                                    jQuery.each(data, function (key, value) {
                                        $('select[name="place_id"]').append('<option value="' + key + '">' + value + '</option>');
                                    });
                                }
                            },
                            error: function (xhr, status, error) {
                                console.error("Error:", error);
                                alert("An error occurred. Please try again.");
                            }
                        });
                    } else {
                        $('select[name="place_id"]').empty().append('<option value="0">Select Place</option>');
                    }
                });

                $('#resetButton').click(function () {
                    $('#building_id').val('').trigger('change');
                    $('#room_id').empty().append('<option value="0">Select Room</option>');
                    $('#place_id').empty().append('<option value="0">Select Place</option>');
                });

            });



        </script>
    @endpush
@endsection


