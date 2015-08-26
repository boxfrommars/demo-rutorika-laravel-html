@extends('layout')

@section('content')
    <h2 class="page-header">Image fields</h2>

    {!! Form::open(['class' => 'form-horizontal']) !!}
    {!! Form::textField('Title', 'title') !!}
    {!! Form::select2Field('Select2', 'select2', [4 => 'Something', 8 => 'Wicked', 15 => 'This', 16 => 'Way', 23 => 'Comes', 42 => '.']) !!}
    {!! Form::select2Field('Select2 Multiple', 'select2multiple', [4 => 'Something', 8 => 'Wicked', 15 => 'This', 16 => 'Way', 23 => 'Comes', 42 => '.'], [16, 23], ['multiple' => true]) !!}
    {!! Form::select2Field('Select2 Async', 'select2async', [], null, ['ajax--url' => '/select2/data']) !!}
    {!! Form::close() !!}
@endsection