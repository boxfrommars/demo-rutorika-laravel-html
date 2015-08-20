@extends('layout')

@section('content')
    <h2 class="page-header">Custom fields</h2>

    {!! Form::open(['class' => 'form-horizontal']) !!}
    {!! Form::codeField('Form::codeField', 'codeField', null, ['mode' => 'html', 'theme' => 'monokai']) !!}
    {!! Form::colorField('Form::codeField', 'colorField', null, []) !!}
    {!! Form::geopointField('Form::geopointField', 'geopointField') !!}
    {!! Form::submitField() !!}
    {!! Form::close() !!}
@endsection


<style>
    /* Code Field */
    .ace-editor {
        min-height: 300px;
    }

    .js-map {
        width: 100%;
        height:400px;
    }
</style>



