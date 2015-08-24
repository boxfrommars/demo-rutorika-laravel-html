@extends('layout')

@section('content')
    <h2 class="page-header">Image fields</h2>

    {!! Form::model($article, ['class' => 'form-horizontal']) !!}
    {!! Form::textField('Title', 'title') !!}
    {!! Form::imageField('Image', 'image', null, [], 'JPG or PNG') !!}
    {!! Form::textField('Something', 'something') !!}
    {!! Form::fileField('File', 'file', null, [], 'PDF, DOC, DOCX <= 3Mb') !!}
    {!! Form::textareaField('Another field', 'something2') !!}
    {!! Form::close() !!}
@endsection