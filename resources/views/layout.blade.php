<!DOCTYPE html>
<html>
<head>
    <title>Rutorika/Html Demo</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/vendor/jquery-minicolors-2.1.12/jquery.minicolors.css">
    <link rel="stylesheet" href="//cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
    <style>
        body {
            padding-top: 50px;
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
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="/assets/vendor/ace/src-noconflict/ace.js"></script>
    <script src="/assets/vendor/jquery-minicolors-2.1.12/jquery.minicolors.min.js"></script>
    <script src="//cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
    <script src="/assets/vendor/leaflet-plugins/layer/tile/Yandex.js"></script>
    <script src="/assets/vendor/leaflet-plugins/layer/tile/Google.js"></script>
    <script src="/assets/vendor/leaflet-plugins/layer/tile/Bing.js"></script>

    <script src="//maps.google.com/maps/api/js?v=3.2&sensor=false"></script>
    <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU"></script>


    <script>

        $(document).ready(function () {

            // codeField
            $('.ace-editor').each(function () {

                var $field = $(this);
                var editor = ace.edit(this);
                var $textarea = $field.siblings('textarea');

                var mode = 'ace/mode/' + $field.data('mode');
                var theme = $field.data('theme');

                editor.getSession().setMode(mode);

                if (theme) {
                    editor.setTheme('ace/theme/' + theme);
                }

                editor.getSession().setValue($textarea.val());

                editor.getSession().on('change', function () {
                    $textarea.val(editor.getSession().getValue());
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

            $('.js-map-field').each(function () {

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
                    console.log(pointMarker);
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
</body>
</html>
