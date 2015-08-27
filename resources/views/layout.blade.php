<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rutorika/Html Demo</title>

    <link rel="stylesheet" href="/assets/vendor/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/vendor/jquery-minicolors-2.1.12/jquery.minicolors.css">
    <link rel="stylesheet" href="//cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
    <link rel="stylesheet" href="/assets/vendor/jQuery-File-Upload-9.11.0/css/jquery.fileupload.css"/>
    <link rel="stylesheet" href="/assets/vendor/magnific-popup/magnific-popup.css"/>
    <link rel="stylesheet" href="/assets/vendor/select2/css/select2.min.css"/>
    <link rel="stylesheet" href="/assets/vendor/select2/css/select2-bootstrap.min.css"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>

        html, body {
            height: 100%;
        }

        body {
            padding-top: 50px;
        }

        .js-upload-image-container .upload-result-wrap {
            margin-bottom: 10px;
        }

        .js-upload-container .btn {
            display: inline-block;
            margin-right: 10px;
        }

        .js-upload-image-container img {
            max-width: 100%;
            max-height: 200px;

            background-image: url(/assets/img/background-pattern.png);
        }
        .upload-result-wrap .form-control-static {
            padding-top: 0; /*because button ulready increase height and space between top and bottom of text*/
            padding-bottom: 0;
        }

        .mfp-figure:after {
            background-image: url(/assets/img/background-pattern.png);
        }

        .select2 {
            width: 100%;
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

            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/">General Fields</a></li>
                    <li><a href="/custom">Custom Fields</a></li>
                    <li><a href="/image">Image Fields</a></li>
                    <li><a href="/select2">Select2</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="/assets/vendor/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script> {{-- only core and sortable --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="/assets/vendor/ace/src-noconflict/ace.js"></script>
    <script src="/assets/vendor/jquery-minicolors-2.1.12/jquery.minicolors.min.js"></script>
    <script src="//cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
    <script src="/assets/vendor/leaflet-plugins/layer/tile/Yandex.js"></script>
    <script src="/assets/vendor/leaflet-plugins/layer/tile/Google.js"></script>
    <script src="/assets/vendor/leaflet-plugins/layer/tile/Bing.js"></script>
    <script src="/assets/vendor/jQuery-File-Upload-9.11.0/js/jquery.iframe-transport.js"></script>
    <script src="/assets/vendor/jQuery-File-Upload-9.11.0/js/jquery.fileupload.js"></script>
    <script src="/assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>
    <script src="/assets/vendor/select2/js/select2.full.js"></script>

    <script src="//maps.google.com/maps/api/js?v=3.2&sensor=false"></script>
    <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU"></script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {

            // codeField
            $('.js-code-field').each(function () {

                var $field = $(this);
                var editor = ace.edit($field.siblings('.js-code').get(0));

                var mode = $field.data('mode') || 'html';
                var theme = $field.data('theme') || 'textmate';

                editor.setTheme('ace/theme/' + theme);
                editor.getSession().setMode('ace/mode/' + mode);

                editor.getSession().setValue($field.val());

                editor.getSession().on('change', function () {
                    $field.val(editor.getSession().getValue());
                });
            });

            // colorField
            $('.js-color-field').each(function () {
                var $field = $(this);
                var settings = $field.data('minicolors');

                settings = $.extend({theme: 'bootstrap'}, settings);

                $field.minicolors(settings);
            });

            // map
            function parsePoint(value) {
                return value ? value.split(':') : null;
            }

            $('.js-geopoint-field').each(function () {

                var $field = $(this);
                var $map = $(this).siblings('.js-map');
                var pointMarker;

                var layerName = $field.data('layer') || 'osm';
                var options = _.defaults($field.data('map') || {}, {
                    center: [51.476852, -0.000498],
                    zoom: 12
                });

                var point = parsePoint($field.val());

                if (point) {
                    options.center = point;
                }

                var map = new L.Map($map.get(0), options);

                if (point) {
                    setPointMarker(point);
                }

                var layer;
                var type;

                function setPointMarker(point) {
                    if (!pointMarker) {
                        pointMarker = L.marker(point, {draggable: true}).addTo(map);
                        pointMarker.on('dragend', function (e) {
                            var latLng = this.getLatLng();
                            setPointMarker(latLng);
                            $field.val(latLng.lat + ':' + latLng.lng);
                        });
                    } else {
                        pointMarker.setLatLng(point);
                    }
                    map.panTo(point);
                }

                function removePointMarker() {
                    if (pointMarker) {
                        map.removeLayer(pointMarker);
                        pointMarker = null;
                    }
                }

                function getLayerType(layerName, variants, defaultType) {
                    var type = $field.data('type') || defaultType;

                    if (!_.contains(variants, type)) {
                        console.warn(layerName + ' doesnt support `' + type + '` type. Only ' + variants.join(' | ') + '. Fallback to ' + defaultType);
                        type = defaultType;
                    }

                    return type;
                }

                switch (layerName) {
                    case 'yandex':
                        // https://tech.yandex.ru/maps/doc/jsapi/2.1/dg/concepts/map-docpage/#parameters
                        // map | satellite | hybrid | publicMap | publicMapHybrid
                        type = getLayerType('Yandex', ['map', 'satellite', 'hybrid', 'publicMap', 'publicMapHybrid'], 'publicMap');
                        layer = new L.Yandex(type);
                        break;
                    case 'osm':
                        // e. g. 'http://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.png'
                        // some examples: http://leaflet-extras.github.io/leaflet-providers/preview/
                        type = $field.data('type') || 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
                        if (!(type.indexOf('http') === 0 || type.indexOf('//') === 0)) {
                            console.warn('OSM doesnt support `' + type + '` type. Fallback to http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
                            type = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
                        }
                        layer = new L.TileLayer(type);
                        break;
                    case 'google':
                        // https://developers.google.com/maps/documentation/javascript/maptypes
                        // ROADMAP | SATELLITE | HYBRID | TERRAIN
                        type = getLayerType('Google', ['ROADMAP', 'SATELLITE', 'HYBRID', 'TERRAIN'], 'ROADMAP');
                        layer = new L.Google('ROADMAP');
                        break;
                    case 'bing':
                        // https://msdn.microsoft.com/en-us/library/ff701716.aspx
                        // Road | Aerial | AerialWithLabels | Birdseye | BirdseyeWithLabels
                        type = getLayerType('Bing', ['Road', 'Aerial', 'AerialWithLabels', 'Birdseye', 'BirdseyeWithLabels'], 'Road');
                        layer = new L.BingLayer('AvoUren6Dm0PAAyhkqPcEQs3PtNsC_VHqb2Pxyac59fd-YME_3FZ_6No4BL5iEAe', {type: type});
                        break;
                    default:
                        console.warn('Layer `' + layerName + '` doesn\'t supported, you should use one of yandex, google, osm or bing. Fallback to OSM layer');
                        layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
                }

                map.addLayer(layer);

                $field.on('change', function () {
                    var val = $field.val();

                    if (val) {
                        var point = parsePoint(val);
                        setPointMarker(point);
                    } else {
                        removePointMarker();
                    }
                });

                map.on('click', function (e) {
                    setPointMarker(e.latlng);
                    $field.val(e.latlng.lat + ':' + e.latlng.lng);
                });
            });

        });


    </script>
    <script src="/assets/js/image.js"></script>
    <script src="/assets/js/select2.js"></script>
</body>
</html>
