@extends('layouts.app')
@section('content')
    @push('css')

        <style>
            body {
                margin-bottom: 6em;
            }

            .treeview .btn-default {
                border-color: #e3e5ef;
            }

            .treeview .btn-default:hover {
                background-color: #f7faea;
                color: #bada55;
            }

            .treeview ul {
                list-style: none;
                padding-left: 32px;
            }

            .treeview ul li {
                padding: 50px 0px 0px 35px;
                position: relative;
            }

            .treeview ul li:before {
                content: "";
                position: absolute;
                top: -26px;
                left: -31px;
                border-left: 2px dashed #a2a5b5;
                width: 1px;
                height: 100%;
            }

            .treeview ul li:after {
                content: "";
                position: absolute;
                border-top: 2px dashed #a2a5b5;
                top: 70px;
                left: -30px;
                width: 65px;
            }

            .treeview ul li:last-child:before {
                top: -22px;
                height: 90px;
            }

            .treeview > ul > li:after, .treeview > ul > li:last-child:before {
                content: unset;
            }

            .treeview > ul > li:before {
                top: 90px;
                left: 36px;
            }

            .treeview > ul > li:not(:last-child) > ul > li:before {
                content: unset;
            }

            .treeview > ul > li > .treeview__level:before {
                height: 60px;
                width: 60px;
                top: -9.5px;
                background-color: #54a6d9;
                border: 7.5px solid #d5e9f6;
                font-size: 22px;
            }

            .treeview > ul > li > ul {
                padding-left: 34px;
            }

            .treeview__level {
                padding: 7px;
                padding-left: 42.5px;
                display: inline-block;
                border-radius: 5px;
                font-weight: 700;
                border: 1px solid #e3e5ef;
                position: relative;
                z-index: 1;
            }

            .treeview__level:before {
                content: attr(data-level);
                position: absolute;
                left: -27.5px;
                top: -6.5px;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 55px;
                width: 55px;
                border-radius: 50%;
                border: 7.5px solid #eef6d5;
                background-color: #bada55;
                color: #fff;
                font-size: 20px;
            }

            .treeview__level[data-level="B"]:before {
                background-color: #ffcc00; /* Yellow for Building */
            }

            .treeview__level[data-level="R"]:before {
                background-color: #eadf18; /* Blue for Room */
            }

            .treeview__level[data-level="P"]:before {
                background-color: #d451ee; /* Red for Place */
            }

        </style>
    @endpush

    <div class="main-content">
        <div class="container-fluid">
            <!-- Card -->
            <div class="card">
                <!-- Product Details -->
                <div class="product-details pb-0">
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Product Details Content -->
                            <div class="product-details-content position-relative">
                                <!-- Product Title -->
                                <h4 class="product_title"> {{$instrument->name}}</h4>
                                <!-- End Product Title -->

                                <!-- Product Price -->
                                <p class="price">
                                        <span class="woocommerce-Price-amount amount"><span
                                                class="woocommerce-Price-currencySymbol">Code:</span>{{$instrument->code}}</span>
                                </p>
                                <!-- End Product Price -->

                                <!-- Color Group -->
                                <div class="color-group d-flex align-items-center">
                                    <span class="list-heading bold">Classes: device, object</span>
                                </div>

                                <div class="color-group d-flex align-items-center">
                                    <span
                                        class="list-heading bold">Calibration date: {{$instrument->calibration_date}}</span>
                                </div>

                                <div class="color-group d-flex align-items-center">
                                    <span
                                        class="list-heading bold">Inventory id : {{$instrument->inventory_number}}</span>
                                </div>

                                <div class="color-group d-flex align-items-center">
                                    <span class="list-heading bold">Digital resource:<a
                                            href="#"> {{$instrument->digital_resource}}</a></span>
                                </div>
                                <!-- End Color Group -->

                                <!-- Product Review -->
                                <div class="product-review d-flex align-items-center">

                                    <!-- End Product Rating -->
                                </div>
                                <!-- End Product Review -->

                                <!-- Add to Cart Button -->
                                <button type="submit" data-toggle="modal" data-target="#createEventModal"
                                        class="button btn btn-fill">Take
                                </button>
                                <button style="background-color: #13be3b" type="submit" data-toggle="modal"
                                        data-target="#printBarCodeModal" class="button btn btn-fill">Print QR
                                </button>
                                @auth
                                    <button style="background-color: #f83c3c" type="submit"
                                            class="button btn btn-fill btn-danger">Remove
                                    </button>
                                @endauth

                                <!-- Product Description -->
                                <div class="woocommerce-product-details__short-description">
                                    <h5>Description</h5>
                                    <p>Mauris imperdiet orci dapibus, commodo libero nec, interdum tortor. Morbi in
                                        nibh faucibus, iaculis lorem vitae, cursus velit. Etiam non blandit ex.
                                        Mauris in fringilla velit. Fusce eu dictum neque. Maecenas tristique sem
                                        neque, vel congue libero efficitur at. Cras molestie ipsum at sem
                                        sollicitudin consectetur. type and scrambled it to make a type specimen
                                        book. It has survived not only five centuries, but also the leap into
                                        electronic typesetting, remaining essentially unchanged.</p>
                                </div>
                                <!-- End Product Description -->
                            </div>
                            <!-- End Product Details Content -->
                        </div>
                        <div class="col-lg-4">
                            <div class="pd-img-wrapp position-relative mb-5 mb-lg-0">

                                <img id="img_01" src="{{asset('uploads/instruments/'.$instrument->image)}}"
                                     data-zoom-image="{{asset('uploads/instruments/'.$instrument->image)}}"
                                     alt=""/>
                            </div>
                        </div>

                    </div>


                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="card mb-30">

                            <div class="treeview js-treeview">
                                <ul>
                                    <li>
                                        <div class="treeview__level" data-level="B">
                                            <span class="level-title">{{$location[0]}}</span>
                                        </div>
                                        <ul>

                                            <li>
                                                <div class="treeview__level" data-level="R">
                                                    <span class="level-title">{{$location[1]}}</span>
                                                </div>
                                                <ul>

                                                    <li>
                                                        <div class="treeview__level" data-level="P">
                                                            <span class="level-title">{{$location[2]}}</span>
                                                        </div>
                                                        <ul>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div id="createEventModal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header pb-0 border-bottom-0 flex-column">


                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">close</span>
                        </button>
                    </div>
                    <!-- End Modal Header -->
                    <form action="take" method="POST">
                        @csrf
                        <!-- Modal Body -->
                        <div id="modalBody2" class="modal-body border-bottom-0 pt-0 pb-0">
                            <!-- Form -->
                            <div class="row">
                                <div class="col-lg-4">
                                    <!-- Form Group -->
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
                                    <!-- End Form Group -->
                                </div>

                                <div class="col-lg-4">
                                    <!-- Form Group -->
                                    <div class="form-group mb-4">
                                        <label for="exampleSelect3" class="mb-2 black bold d-block">Room</label>
                                        <div class="custom-select style--two">
                                            <select class="theme-input-style" name="room_id">
                                                <option value="0">Select Room</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->
                                </div>

                                <div class="col-lg-4">
                                    <!-- Form Group -->
                                    <div class="form-group mb-4">
                                        <label for="exampleSelect3" class="mb-2 black bold d-block">Place</label>
                                        <div class="custom-select style--two">
                                            <select class="theme-input-style" name="place_id">
                                                <option value="0">Select Place</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->
                                    <input type="hidden" name="bId" value="{{$IId}}">
                                </div>
                            </div>

                        </div>
                        <!-- End Modal Body -->

                        <div class="modal-footer border-top-0 pt-10">
                            <button class="btn btn-light btn-sm" type="submit">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="printBarCodeModal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header pb-0 border-bottom-0 flex-column">


                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">close</span>
                        </button>
                    </div>
                    <!-- End Modal Header -->
                    {{--                        <form id="barCodeNum" >--}}
                    <form id="barCode" action="barcodeNumber" method="POST">
                        @csrf
                        <!-- Modal Body -->
                        <div id="modalBody2" class="modal-body border-bottom-0 pt-0 pb-0" style="padding: 4rem">
                            <!-- Form -->
                            <div class="row">
                                <div class="form-group">
                                    <label for="name" class="mb-2 black bold">How many barcode will be printed</label>
                                    <input type="number" class="theme-input-style" name="barcodeNumber">
                                    <input type="hidden" name="iid" value="{{$instrument->id}}">
                                </div>
                                <!-- End Form Group -->

                            </div>

                        </div>
                        <!-- End Modal Body -->

                        <div class="modal-footer border-top-0 pt-10">
                            <button class="btn btn-light btn-sm" type="submit" id="submit">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @push('body-scripts')
        <script src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <script src="{{asset('admin/plugins/datepicker/datepicker.min.js')}}"></script>
        <script src="{{asset('admin/plugins/datepicker/i18n/datepicker.en.js')}}"></script>
        <script src="{{asset('admin/plugins/timepicker/jquery.timepicker.min.js')}}"></script>
        <script src="{{asset('admin/plugins/datepicker/custom-form-datepicker.js')}}"></script>
        <script src="{{asset('admin/js/custom.js')}}"></script>
    @endpush

@endsection
