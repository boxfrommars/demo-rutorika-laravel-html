@extends('layout')

@section('content')
    <h2 class="page-header">Laravelcollection fields wrapped</h2>

    {!! Form::open(['class' => 'form-horizontal']) !!}
    {!! Form::textField('Form::textField', 'textField') !!}
    {!! Form::textareaField('Form::textareaField', 'textareaField') !!}
    {!! Form::passwordField('Form::passwordField', 'passwordField', [], 'Should contains letters and numbers') !!}
    {!! Form::checkboxField('Form::checkboxField', 'checkboxField') !!}
    {!! Form::numberField('Form::numberField', 'numberField') !!}
    {!! Form::selectField('selectField', 'selectField', [4 => 'Something', 8 => 'Wicked', 15 => 'This', 16 => 'Way', 23 => 'Comes', 42 => '.']) !!}
    {!! Form::staticField('staticField', 'Submit form to display errors.') !!}
    {!! Form::submitField() !!}
    {!! Form::close() !!}

<h4>Code</h4>
<div class="code">@{!! Form::open(['class' => 'form-horizontal']) !!}

@{!! Form::textField('Form::textField', 'textField') !!}
@{!! Form::textareaField('Form::textareaField', 'textareaField') !!}
@{!! Form::passwordField('Form::passwordField', 'passwordField', [], 'Should contains letters and numbers') !!}
@{!! Form::checkboxField('Form::checkboxField', 'checkboxField') !!}
@{!! Form::numberField('Form::numberField', 'numberField') !!}
@{!! Form::selectField('Form::selectField', 'selectField', [4 => 'Something', 8 => 'Wicked', 15 => 'This', 16 => 'Way', 23 => 'Comes', 42 => '.']) !!}
@{!! Form::staticField('Form::staticField', 'Submit form to display errors.') !!}
@{!! Form::submitField() !!}

@{!! Form::close() !!}
</div>
@endsection