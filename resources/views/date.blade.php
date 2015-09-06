@extends('layout')

@section('content')
    <h2 class="page-header">Date and Time fields</h2>

    {!! Form::open() !!}

    {!! Form::datetimeField('Date and Time', 'datetime') !!}
    {!! Form::dateField('Date', 'date') !!}
    {!! Form::timeField('Time', 'time') !!}
    {!! Form::datetimeField('Locale ru', 'ru-datetime', null, ['datetime' => ['locale' => 'ru']]) !!}
    {!! Form::datetimeField('Side by side', 'side-by-side', null, ['datetime' => ['sideBySide' => true]]) !!}

    {!! Form::submitField() !!}
    {!! Form::close() !!}

    <h4>Code</h4>
    <div class="code">@{!! Form::open() !!}

@{!! Form::datetimeField('Date and Time', 'datetime') !!}
@{!! Form::dateField('Date', 'date') !!}
@{!! Form::timeField('Time', 'time') !!}
@{!! Form::datetimeField('Locale ru', 'ru-datetime', null, ['datetime' => ['locale' => 'ru']]) !!}
@{!! Form::datetimeField('Side by side', 'side-by-side', null, ['datetime' => ['sideBySide' => true]]) !!}

@{!! Form::submitField() !!}
@{!! Form::close() !!}
</div>
@endsection