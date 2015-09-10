<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rutorika/Html Demo</title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/vendor/rutorika/form/build/css/vendor.min.css">
    <link rel="stylesheet" href="/vendor/rutorika/form/build/css/style.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>

        html, body {
            height: 100%;
        }

        body {
            padding-top: 50px;
        }
        .sidebar {
            margin-top: 82px;
            /*background: #efefef;*/
        }

        .code {
            font-family: monospace;
            white-space: pre;
            overflow-x: scroll;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Rutorika/Html Demo</a>
            </div>
        </div>
    </nav>

    <div class="main container">
        <div class="row">
            <div class="col-md-2 sidebar">
                <ul class="nav nav-pills nav-stacked" id="navigation">
                    <li><a href="/">All</a></li>
                    <li><a href="/general">General Fields</a></li>
                    <li><a href="/color">Color Fields</a></li>
                    <li><a href="/maps">Map Fields</a></li>
                    <li><a href="/upload-fields">Upload Fields</a></li>
                    <li><a href="/select2">Select2 Fields</a></li>
                    <li><a href="/code">Code Fields</a></li>
                    <li><a href="/date">Date Fields</a></li>
                </ul>
            </div>
            <div class="col-md-10">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="/assets/jquery-2.1.4.js"></script>

    <script>
        // set CSRF token header to all ajax requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script src="/vendor/rutorika/form/build/js/vendor.js"></script>
    <script src="/vendor/rutorika/form/build/js/scripts.js"></script>

    <script src="/assets/highlight.pack.js"></script>
    <script>
        $(document).ready(function() {
            // navigation
            $('#navigation').find('[href="' + location.pathname +'"]').parent('li').addClass('active');

            // highlight examples
            $('.code').each(function() {
                hljs.highlightBlock(this);
            });
        });
    </script>

    <script>
    </script>
    <script>


    </script>
</body>
</html>
