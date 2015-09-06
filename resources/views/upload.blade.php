@extends('layout')

@section('content')
    <h2 class="page-header">Image fields</h2>

    {!! Form::model($article) !!}
    {!! Form::imageField('Image upload', 'image') !!}
    {!! Form::fileField('File upload', 'file') !!}

    {!! Form::imageField('Image upload with help', 'image', null, [], 'JPG or PNG') !!}
    {!! Form::fileField('File upload with help', 'file', null, [], 'PDF, DOC, DOCX <= 3Mb') !!}
    {!! Form::close() !!}

    <h4>Code</h4>
    <div class="code">@{!! Form::model($article) !!}

@{!! Form::imageField('Image upload', 'image', null, [], 'JPG or PNG') !!}
@{!! Form::fileField('File upload', 'file', null, [], 'PDF, DOC, DOCX <= 3Mb') !!}

@{!! Form::close() !!}</div>
@endsection