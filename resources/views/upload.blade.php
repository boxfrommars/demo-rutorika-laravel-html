@extends('layout')

@section('content')
    <h2 class="page-header">Upload fields</h2>

    {!! Form::model($article) !!}
    {!! Form::imageField('Image upload', 'image') !!}
    {!! Form::fileField('File upload', 'file') !!}

    {!! Form::imageField('Image upload with help', 'imageHelp', null, [], 'JPG or PNG') !!}
    {!! Form::imageUploadMultipleField('Multiple image upload', 'imageMultiple', null, [], 'JPG or PNG') !!}
    {!! Form::fileField('File upload with help', 'fileHelp', null, ['type' => 'document'], 'PDF, DOC, DOCX <= 3Mb') !!}

    {!! Form::audioField('Audio', 'audio') !!}

    {!! Form::submitField() !!}
    {!! Form::close() !!}

    <h4>Code</h4>
    <div class="code">@{!! Form::model($article) !!}
@{!! Form::imageField('Image upload', 'image') !!}
@{!! Form::fileField('File upload', 'file') !!}

@{!! Form::imageField('Image upload with help', 'imageHelp', null, [], 'JPG or PNG') !!}
@{!! Form::imageUploadMultipleField('Multiple image upload', 'imageMultiple', null, [], 'JPG or PNG') !!}
@{!! Form::fileField('File upload with help', 'fileHelp', null, ['type' => 'document'], 'PDF, DOC, DOCX <= 3Mb') !!}

@{!! Form::audioField('Audio', 'audio') !!}

@{!! Form::submitField() !!}
@{!! Form::close() !!}
</div>
@endsection