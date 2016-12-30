<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>WebCom Ind</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="nitish.dola@gmail.com" />
<!-- css -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/flexslider/flexslider.css') }}" rel="stylesheet" media="screen" />   
<link href="{{ asset('assets/css/cubeportfolio.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />

<!-- Theme skin -->
<link id="t-colors" href="{{ asset('assets/skins/default.css') }}" rel="stylesheet" />

<link id="t-colors" href="{{ asset('assets/plugins/zebra/public/css/default.css') }}" rel="stylesheet" />
 @yield('customCss')
</head>
<body>
    <div id="wrapper">
        <header>
            @include('nav')
        </header>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if(Session::has('message'))
                    <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {!! Session::get('message') !!}
                    </div>
                    @endif
                </div>

                <div class="col-lg-12" style="padding-top: 40px;">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/flexslider/jquery.flexslider-min.js') }}"></script> 
    <script src="{{ asset('assets/plugins/flexslider/flexslider.config.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('assets/js/stellar.js') }}"></script>
    <script src="{{ asset('assets/js/classie.js') }}"></script>
    <script src="{{ asset('assets/js/uisearch.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.cubeportfolio.min.js') }}"></script>
    <script src="{{ asset('assets/js/google-code-prettify/prettify.js') }}"></script>
    <script src="{{ asset('assets/js/animate.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    
    <script src="{{ asset('assets/plugins/zebra/public/javascript/zebra_datepicker.js') }}"></script> 
    <script>
        $('.month-pick').Zebra_DatePicker({ format: 'm/Y' });
    </script>
    @yield('customJs')
</body>


</html>