<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png/')}}">

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet">

    <!-- ======= BEGIN GLOBAL MANDATORY STYLES ======= -->
    <link rel="stylesheet" href="{{asset('admin/bootstrap/css/bootstrap.min.css/')}}">
    <link rel="stylesheet" href="{{asset('admin/fonts/icofont/icofont.min.css')}}">
    <!-- ======= END BEGIN PAGE LEVEL PLUGINS STYLES ======= -->


    <!-- ======= MAIN STYLES ======= -->
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <!-- ======= END MAIN STYLES ======= -->
    <!-- Scripts -->
    {{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}

    <!-- Add the following media query in the <head> section or include it in your CSS file -->
    <style>
        .print-back{
            text-align: center;
            position: fixed;
            padding: 10px 10px 10px 10px;
            bottom: 0;
            width: 100%;
        }
        /* Default styles for all screens */
        @media print {
            button {
                display: none;
            }
            .print-back{
                display: none;
            }
          /*  .container {
                width: 100%; !* Ensure the container spans the full page width *!
            }*/

            .card {
                margin-bottom: 20px; /* Add margin between cards */
            }

            .row {
                display: flex;
                flex-wrap: wrap;
            }

            .col-print {
                width: 20%; /* Set width to 20% for 5 columns in a row */
                box-sizing: border-box;
                padding: 10px; /* Add padding for spacing between columns */
            }

            .product-details {
                border: 1px solid #ccc; /* Add a border around each product detail */
                padding: 10px;
                text-align: center;
            }

            .barcode img {
                max-width: 100%;
                height: 80px;
                width: 200px;
                display: block; /* Ensure the image does not affect the text layout */
                margin: 0 auto; /* Center the image within the container */
            }

            .pid {
                margin-top: 10px;
                font-size: 14px;
                font-weight: bold;
            }

        }

    </style>
</head>
<body>

        <div class="container-fluid" style=" padding-top: 50px">

                <div class="card">

                    <div class="row">
                        @for($i=0; $i < $numberOfCodes; $i++)
                            <div class="col-print">
                                <div class="product-details">
                                    <div class="barcode">
                                        <img
                                            src="data:image/png;base64,{{ DNS1D::getBarcodePNG($instrumentCode,'C39') }}"
                                            height="680" width="380"/><br/>
                                        <p class="pid">{{$instrumentCode}}</p>
                                    </div>
                                </div>
                            </div>

                        @endfor
                    </div>

                </div>

           <div class="print-back">
               <a href="javascript:history.back()"><button class="btn btn-outline-info"><i class="icofont-arrow-left"></i>Back</button></a>
               <button style="background-color: #5cc55d" class="btn btn-info" onclick="window.print()">Print <i class="icofont-1x icofont-print"></i></button>
           </div>


        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


</body>
</html>
