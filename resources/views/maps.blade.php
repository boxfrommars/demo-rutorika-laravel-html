@extends('layout')

@section('content')

    <script src="//maps.google.com/maps/api/js?v=3.2&sensor=false"></script>
    <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU"></script>

    <h2 class="page-header">Custom fields</h2>

    {!! Form::open() !!}
    {!! Form::geopointField('Yandex public', 'yandex-public', null, ['map' => ['center' => [45.04, 39], 'zoom' => 12], 'layer' => 'yandex', 'type' => 'publicMap']) !!}
    {!! Form::geopointField('Google hybrid', 'google-hybrid', null, ['map' => ['center' => [45.04, 39], 'zoom' => 10], 'layer' => 'google', 'type' => 'HYBRID']) !!}
    {!! Form::geopointField('Bing aerial with labels', 'geopointField', null, ['map' => ['center' => [45.04, 39], 'zoom' => 8], 'layer' => 'bing', 'type' => 'AerialWithLabels']) !!}
    {!! Form::geopointField('OSM', 'geopointField', null, ['map' => ['zoom' => 8], 'layer' => 'osm']) !!}
    {!! Form::geopointField('OSM Custom (Stamen.Watercolor)', 'geopointField', null, ['map' => ['zoom' => 6], 'layer' => 'osm', 'type' => 'http://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.png']) !!}
    {!! Form::close() !!}
<h4>Code</h4>
<div class="code">@{!! Form::open() !!}

@{!! Form::geopointField('Yandex public', 'yandex-public', null, ['map' => ['center' => [45.04, 39], 'zoom' => 12], 'layer' => 'yandex', 'type' => 'publicMap']) !!}
@{!! Form::geopointField('Google hybrid', 'google-hybrid', null, ['map' => ['center' => [45.04, 39], 'zoom' => 10], 'layer' => 'google', 'type' => 'HYBRID']) !!}
@{!! Form::geopointField('Bing aerial with labels', 'geopointField', null, ['map' => ['center' => [45.04, 39], 'zoom' => 8], 'layer' => 'bing', 'type' => 'AerialWithLabels']) !!}
@{!! Form::geopointField('OSM', 'geopointField', null, ['map' => ['zoom' => 8], 'layer' => 'osm']) !!}
@{!! Form::geopointField('OSM Custom (Stamen.Watercolor)', 'geopointField', null, ['map' => ['zoom' => 6], 'layer' => 'osm', 'type' => 'http://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.png']) !!}

@{!! Form::close() !!}
</div>
@endsection

