<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png/')}}">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/bootstrap/css/bootstrap.min.css/')}}">
    <link rel="stylesheet" href="{{asset('admin/fonts/icofont/icofont.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">

    <style>
        .print-back{
            text-align: center;
            position: fixed;
            padding: 10px 10px 10px 10px;
            bottom: 0;
            width: 100%;
        }
        /* Default styles for all screens */
        /* General CSS */
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
            height: auto;
            display: block; /* Ensure the image does not affect the text layout */
            margin: 0 auto; /* Center the image within the container */
        }

        .pid {
            margin-top: 10px;
            font-size: 14px;
            font-weight: bold;
        }

        /* Media Query for Responsive Design */

        @media screen and (max-width: 768px) {
            .col-print {
                width: 50%; /* Set width to 50% for 2 columns in a row on smaller screens */
            }
            button {
                display: none;
            }
            .print-back {
                display: none;
            }

        }
        /* Hide buttons during print */
        @media print {
            button {
                display: none !important;
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
</html>
