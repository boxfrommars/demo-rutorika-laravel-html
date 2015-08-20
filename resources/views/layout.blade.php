<!DOCTYPE html>
<html>
<head>
    <title>Rutorika/Html Demo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/vendor/jquery-minicolors-2.1.12/jquery.minicolors.css">
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
<script src="/assets/vendor/ace/src-noconflict/ace.js"></script>
<script src="/assets/vendor/jquery-minicolors-2.1.12/jquery.minicolors.min.js"></script>

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
    });

    if ($('.map').length > 0) {
        ymaps.ready(init);
    }

    function initMap() {

        $('.js-map').each(function () {

            var $container = $(this).parents('.map-container');
            var $input = $container.find('input');
            var val = $input.val();
            var mark;
            var center = [45.035407, 38.975277];
            if (val) {
                center = val.split(':');
                mark = new ymaps.Placemark(center);
            }

            var myMap = new ymaps.Map(this, {
                center: center,
                zoom: 14,
                controls: ['smallMapDefaultSet']
            });
            myMap.behaviors.disable('scrollZoom');

            if (mark) {
                myMap.geoObjects.add(mark);
            }

            myMap.events.add('click', function (e) {
                if (mark) myMap.geoObjects.remove(mark);
                var coords = e.get('coords');
                mark = new ymaps.Placemark(coords);
                myMap.geoObjects.add(mark);
                $input.val(coords[0] + ':' + coords[1]);
            });

            $input.on('change', function () {
                var val = $(this).val();
                if (val) {
                    if (mark) myMap.geoObjects.remove(mark);
                    mark = new ymaps.Placemark(val.split(':'));
                    myMap.setCenter(val.split(':'));
                    myMap.geoObjects.add(mark);
                }
            });
        });
    }


</script>
</body>
</html>
