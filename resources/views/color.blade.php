@extends('layout')

@section('content')
    <h2 class="page-header">Color fields</h2>

    {!! Form::open(['class' => 'form-horizontal']) !!}
    {!! Form::colorField('Default (hue)', 'colorField', null, []) !!}
    {!! Form::colorField('Brightness', 'brightness', null, ['minicolors' => ['control' => 'brightness', 'defaultValue' => '#ff88ff']]) !!}
    {!! Form::colorField('Saturation', 'saturation', null, ['minicolors' => ['control' => 'saturation']]) !!}
    {!! Form::colorField('Wheel', 'wheel', null, ['minicolors' => ['control' => 'wheel']]) !!}
    {!! Form::submitField() !!}
    {!! Form::close() !!}

    <h4>Code</h4>
    <div class="code">@{!! Form::open(['class' => 'form-horizontal']) !!}

@{!! Form::colorField('Default (hue)', 'colorField', null, []) !!}
@{!! Form::colorField('Brightness', 'brightness', null, ['minicolors' => ['control' => 'brightness', 'defaultValue' => '#ff88ff']]) !!}
@{!! Form::colorField('Saturation', 'saturation', null, ['minicolors' => ['control' => 'saturation']]) !!}
@{!! Form::colorField('Wheel', 'wheel', null, ['minicolors' => ['control' => 'wheel']]) !!}

@{!! Form::submitField() !!}
@{!! Form::close() !!}
</div>
@endsection