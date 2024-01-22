@extends('layouts.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content d-flex flex-column flex-md-row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card bg-transparent">
                        <!-- Contact Header -->
                        <div
                            class="contact-header d-flex align-items-sm-center media flex-column flex-sm-row bg-white mb-30">
                            <div class="contact-header-left media-body d-flex align-items-center mr-4">

                                <!-- Search Form -->

                                <div class="theme-input-group style--two">
                                    <input type="text" name="search" id="search" class="theme-input-style"
                                           placeholder="Search Here" onfocus="this.value=''">
                                </div>
                                {{--                                    <div id="search_list"></div>--}}
                                <div class="col-lg-3"></div>
                            </div>


                        </div>
                        <!-- End Contact Header -->


                        <div  id="search_list">
                            <!-- Invoice List Table -->
                            <table class="contact-list-table text-nowrap bg-white">
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">


                                </div>

                            </table>
                            <!-- End Invoice List Table -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Main Content -->
@endsection


<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('#search').on('keyup', function () {
            var query = $(this).val();
            // Check if the query is empty
            if (query.trim() === '') {
                // If it's empty, clear the search results
                $('#search_list').html('');
                return; // Exit the function
            }

            // If the query is not empty, make the AJAX request
            $.ajax({
                url: "testSearch",
                type: "GET",
                data: {'search': query},
                success: function (data) {
                    $('#search_list').html(data);
                }
            });
        });
    });
</script>
