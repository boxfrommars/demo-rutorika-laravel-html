@extends('layout')

@section('content')
    <h2 class="page-header">All fields with default options</h2>

    {!! Form::open() !!}
    {!! Form::textField('Text', 'text') !!}
    {!! Form::checkboxField('Checkbox', 'checkbox') !!}
    {!! Form::numberField('Number', 'number') !!}
    {!! Form::booleanField('Boolean', 'boolean', 1, null, [], 'Sends 0 if has not checked') !!}
    {!! Form::selectField('Select', 'select', [4 => 'Something', 8 => 'Wicked', 15 => 'This', 16 => 'Way', 23 => 'Comes', 42 => '.']) !!}

    {!! Form::colorField('Color', 'color') !!}

    {!! Form::datetimeField('Date and Time', 'datetime') !!}
    {!! Form::dateField('Date', 'date') !!}
    {!! Form::timeField('Time', 'time') !!}

    {!! Form::geopointField('Placemark', 'placemark') !!}

    {!! Form::select2Field('Select2', 'select2', [4 => 'Something', 8 => 'Wicked', 15 => 'This', 16 => 'Way', 23 => 'Comes', 42 => '.']) !!}
    {!! Form::select2Field('Select2 Multiple', 'select2-multiple', [4 => 'Something', 8 => 'Wicked', 15 => 'This', 16 => 'Way', 23 => 'Comes', 42 => '.'], null, ['multiple' => true]) !!}

    {!! Form::imageField('Image upload', 'image', 'e4/81/bc974a89ae98787412fb74158b0e.png') !!}
    {!! Form::imageUploadMultipleField('Multiple image upload', 'imageMultiple', null, [], 'JPG or PNG') !!}
    {!! Form::fileField('File upload', 'file', 'e4/81/bc974a89ae98787412fb74158b0e.png') !!}

    {!! Form::codeField('Code', 'code') !!}
    {!! Form::audioField('Audio', 'audio') !!}

    {!! Form::staticField('Static', 'Submit form to display errors.') !!}

    {!! Form::submitField() !!}
    {!! Form::close() !!}

    <h4>Code</h4>
    <div class="code">@{!! Form::open() !!}
@{!! Form::textField('Text', 'text') !!}
@{!! Form::checkboxField('Checkbox', 'checkbox') !!}
@{!! Form::numberField('Number', 'number') !!}
@{!! Form::booleanField('Boolean', 'boolean', 1, null, [], 'Sends 0 if has not checked') !!}
@{!! Form::selectField('Select', 'select', [4 => 'Something', 8 => 'Wicked', 15 => 'This', 16 => 'Way', 23 => 'Comes', 42 => '.']) !!}

@{!! Form::colorField('Color', 'color') !!}

@{!! Form::datetimeField('Date and Time', 'datetime') !!}
@{!! Form::dateField('Date', 'date') !!}
@{!! Form::timeField('Time', 'time') !!}

@{!! Form::geopointField('Placemark', 'placemark') !!}

@{!! Form::select2Field('Select2', 'select2', [4 => 'Something', 8 => 'Wicked', 15 => 'This', 16 => 'Way', 23 => 'Comes', 42 => '.']) !!}
@{!! Form::select2Field('Select2 Multiple', 'select2-multiple', [4 => 'Something', 8 => 'Wicked', 15 => 'This', 16 => 'Way', 23 => 'Comes', 42 => '.'], null, ['multiple' => true]) !!}

@{!! Form::imageField('Image upload', 'image', 'e4/81/bc974a89ae98787412fb74158b0e.png') !!}
@{!! Form::imageUploadMultipleField('Multiple image upload', 'imageMultiple', null, [], 'JPG or PNG') !!}
@{!! Form::fileField('File upload', 'file', 'e4/81/bc974a89ae98787412fb74158b0e.png') !!}

@{!! Form::codeField('Code', 'code') !!}
@{!! Form::audioField('Audio', 'audio') !!}

@{!! Form::staticField('Static', 'Submit form to display errors.') !!}

@{!! Form::submitField() !!}
@{!! Form::close() !!}
</div>
@endsection