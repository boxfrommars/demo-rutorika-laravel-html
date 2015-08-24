@extends('layout')

@section('content')
    <h2 class="page-header">Image fields</h2>

    {!! Form::model($article, ['class' => 'form-horizontal']) !!}
    {!! Form::textField('Title', 'title') !!}
    {!! Form::imageField('Image', 'image') !!}
    {!! Form::textField('Something', 'something') !!}
    {!! Form::fileField('File', 'file') !!}
    {!! Form::close() !!}
@endsection