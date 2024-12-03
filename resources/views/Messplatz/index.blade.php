<style>
    .custom-table-container{
        border-radius: 6px !important;
    }
</style>

@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="row">
            <div class="card-body">
                <div class="d-sm-flex justify-content-between align-items-center">
                    <h4 class="font-20 ml-3">Messplatz List</h4>

                    <div class="d-flex flex-wrap">
                            <a href="{{ route('messplatz.create') }}">
                                <button class="btn btn-sm btn-info mr-3"><i class="icofont-plus"></i></button>
                            </a>

                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="table-responsive custom-table-container p-4 rounded">
                    <!-- Row for Show Entries and Room Filter -->
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                        <div class="mb-2 mb-md-0">
                            <!-- Placeholder for Show Entries dropdown (DataTables will insert it here) -->
                        </div>
                        <div class="ml-auto">
                            <!-- Room Name Filter Dropdown -->
                            <label for="building_id" class="mr-2">Filter by Place Name:</label>
                            <select id="building_id" class="form-control d-inline-block w-auto" name="building_id">
                                <option value="">All Building</option>
                                @foreach($buildings as $building)
                                    <option value="{{$building->id}}"> {{$building->name}} </option>
                                @endforeach
                            </select>
                            <select id="room_id" class="form-control d-inline-block w-auto" name="room_id">
                                <option value="">All Place</option>
                                @foreach($rooms as $room)
                                    <option value="{{$room->id}}"> {{$room->name}} </option>
                                @endforeach
                            </select>
                            <select id="roomFilter" class="form-control d-inline-block w-auto" name="place_id">
                                <option value="0">Select Place</option>
                            </select>
                        </div>
                    </div>

                    <!-- Rooms and Instruments Table -->
                    <table id="roomsTable" class="table table-striped table-bordered dt-responsive nowrap"
                           style="width:100%">
                        <thead class="bg-primary text-white">
                        <tr>
                            <th>Places</th>
                            <th>Messplatz</th>
                            <th width="10%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($messplatzs as $key=>$messplatz)
                            <tr>

                                <td>{{$messplatz->place->name}}</td>
                                <td>{{$messplatz->name}}</td>
                                <td width="10%"><a href="{{ route('messplatz.edit', $messplatz->id) }}">
                                        <button style="background-color: #1e7e34" class="btn btn-sm btn-info"><i
                                                    class="icofont-edit"></i></button>
                                    </a>
                                    <a href="/room/delete/{{$messplatz->id}}">
                                        <button style="background-color: #ee3131" class="btn btn-info"><i
                                                    class="icofont-trash"></i></button>
                                    </a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('body-scripts')

        <script src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

        <script type="text/javascript">
            jQuery(document).ready(function () {
                jQuery('select[name="building_id"]').on('change', function () {
                    $('select[name="place_id"]').empty().append('<option value="0">Select Place</option>');
                    var buildingID = jQuery(this).val();

                    if (buildingID) {
                        jQuery.ajax({
                            url: 'messplatz/getRooms/' + buildingID,
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
                            url: 'messplatz/getPlaces/' + roomID,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                console.log(data);
                                jQuery('select[name="place_id"]').empty().append('<option value="0">Select Place</option>');

                                if (Array.isArray(data) && data.length === 0) {
                                    $('select[name="place_id"]').append('<option value="0">No place assigned</option>');
                                } else {
                                    jQuery.each(data, function (key, value) {
                                        // Setting both the 'value' and the 'name' as the same
                                        $('select[name="place_id"]').append('<option value="' + value + '" name="' + value + '">' + value + '</option>');
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
