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

    <!-- ======= END BEGIN PAGE LEVEL PLUGINS STYLES ======= -->


    <!-- ======= MAIN STYLES ======= -->
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <!-- ======= END MAIN STYLES ======= -->
    <!-- Scripts -->
    {{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}

    <!-- Add the following media query in the <head> section or include it in your CSS file -->
    <style>
        /* Default styles for all screens */
        @media print {
            button {
                display: none;
            }

            .container {
                width: 100%; /* Ensure the container spans the full page width */
            }

            .col-print {
                float: left;
                width: 25%; /* Adjust the width as needed for your columns */
                box-sizing: border-box;
            }
            @page {
                size: auto; /* You can set a specific size if needed */
                margin: 0mm; /* Set margins to zero to remove headers and footers */
                box-decoration-break: clone; /* Ensure content doesn't break across pages */
            }
        }

    </style>
</head>
<body>

        <div class="container" style=" padding-top: 50px">

                <div class="card">
                    <!-- Product Details -->
                    <div class="row">
                        @for($i=0; $i < $numberOfCodes; $i++)

                            <div class="col-print">
                                <div class="product-details">
                                    <div class="barcode">
                                        <img
                                            src="data:image/png;base64,{{ DNS1D::getBarcodePNG($instrumentCode,'C39') }}"
                                            height="380" width="180"/><br/>
                                        <p class="pid">{{$instrumentCode}}</p>
                                    </div>
                                </div>
                            </div>

                        @endfor
                    </div>

                    <button onclick="window.print()">Print this page</button><br>
                    <a href="javascript:history.back()"><button >Go Back</button></a>


                </div>
            </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


</body>
</html>
