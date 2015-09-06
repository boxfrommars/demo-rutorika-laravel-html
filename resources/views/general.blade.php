@extends('layout')

@section('content')
    <h2 class="page-header">General fields</h2>

    {!! Form::open() !!}
    {!! Form::textField('Form::textField', 'textField', null, [], 'Should contains letters and numbers') !!}
    {!! Form::checkboxField('Form::checkboxField', 'checkboxField') !!}
    {!! Form::numberField('Form::numberField', 'numberField') !!}
    {!! Form::selectField('selectField', 'selectField', [4 => 'Something', 8 => 'Wicked', 15 => 'This', 16 => 'Way', 23 => 'Comes', 42 => '.']) !!}
    {!! Form::staticField('staticField', 'Submit form to display errors.') !!}
    {!! Form::submitField() !!}
    {!! Form::close() !!}

    <h2 class="page-header">Vertical</h2>

    {!! Form::open(['theme' => 'bootstrap-vertical']) !!}
    {!! Form::textField('Form::textField', 'textField', null, [], 'Should contains letters and numbers') !!}
    {!! Form::textareaField('Form::textareaField', 'textareaField') !!}
    {!! Form::checkboxField('Form::checkboxField', 'checkboxField') !!}
    {!! Form::numberField('Form::numberField', 'numberField') !!}
    {!! Form::selectField('selectField', 'selectField', [4 => 'Something', 8 => 'Wicked', 15 => 'This', 16 => 'Way', 23 => 'Comes', 42 => '.']) !!}
    {!! Form::staticField('staticField', 'Submit form to display errors.') !!}
    {!! Form::submitField() !!}
    {!! Form::close() !!}

    <h2 class="page-header">Change label width</h2>

    {!! Form::open(['label-width' => 4, 'control-width' => 4]) !!}
    {!! Form::textField('Form::textField', 'textField', null, [], 'Should contains letters and numbers') !!}
    {!! Form::textareaField('Form::textareaField', 'textareaField') !!}
    {!! Form::checkboxField('Form::checkboxField', 'checkboxField') !!}
    {!! Form::numberField('Form::numberField', 'numberField') !!}
    {!! Form::selectField('selectField', 'selectField', [4 => 'Something', 8 => 'Wicked', 15 => 'This', 16 => 'Way', 23 => 'Comes', 42 => '.']) !!}
    {!! Form::staticField('staticField', 'Submit form to display errors.') !!}
    {!! Form::submitField() !!}
    {!! Form::close() !!}

    <h4>Code</h4>
    <div class="code">@{!! Form::open() !!}

@{!! Form::textField('Form::textField', 'textField') !!}
@{!! Form::textField('Form::textField', 'textField', null, [], 'Should contains letters and numbers') !!}
@{!! Form::checkboxField('Form::checkboxField', 'checkboxField') !!}
@{!! Form::numberField('Form::numberField', 'numberField') !!}
@{!! Form::selectField('Form::selectField', 'selectField', [4 => 'Something', 8 => 'Wicked', 15 => 'This', 16 => 'Way', 23 => 'Comes', 42 => '.']) !!}
@{!! Form::staticField('Form::staticField', 'Submit form to display errors.') !!}
@{!! Form::submitField() !!}

@{!! Form::close() !!}

// vertical form
@{!! Form::open(['theme' => 'bootstrap-vertical']) !!}

@{!! Form::textField('Form::textField', 'textField') !!}
@{!! Form::textField('Form::textField', 'textField', null, [], 'Should contains letters and numbers') !!}
@{!! Form::checkboxField('Form::checkboxField', 'checkboxField') !!}
@{!! Form::numberField('Form::numberField', 'numberField') !!}
@{!! Form::selectField('Form::selectField', 'selectField', [4 => 'Something', 8 => 'Wicked', 15 => 'This', 16 => 'Way', 23 => 'Comes', 42 => '.']) !!}
@{!! Form::staticField('Form::staticField', 'Submit form to display errors.') !!}
@{!! Form::submitField() !!}

@{!! Form::close() !!}

// column width changed
@{!! Form::open(['label-width' => 4, 'column-width' => 4]) !!}

@{!! Form::textField('Form::textField', 'textField') !!}
@{!! Form::textField('Form::textField', 'textField', null, [], 'Should contains letters and numbers') !!}
@{!! Form::checkboxField('Form::checkboxField', 'checkboxField') !!}
@{!! Form::numberField('Form::numberField', 'numberField') !!}
@{!! Form::selectField('Form::selectField', 'selectField', [4 => 'Something', 8 => 'Wicked', 15 => 'This', 16 => 'Way', 23 => 'Comes', 42 => '.']) !!}
@{!! Form::staticField('Form::staticField', 'Submit form to display errors.') !!}
@{!! Form::submitField() !!}

@{!! Form::close() !!}
</div>
@endsection