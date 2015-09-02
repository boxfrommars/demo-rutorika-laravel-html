@extends('layout')

@section('content')
    <h2 class="page-header">Select2 fields</h2>

    {!! Form::open(['class' => 'form-horizontal']) !!}

    {!! Form::select2Field('Select2', 'select2', [4 => 'Something', 8 => 'Wicked', 15 => 'This', 16 => 'Way', 23 => 'Comes', 42 => '.']) !!}
    {!! Form::select2Field('Select2 Multiple', 'select2-multiple', [4 => 'Something', 8 => 'Wicked', 15 => 'This', 16 => 'Way', 23 => 'Comes', 42 => '.'], [16, 23], ['multiple' => true]) !!}

    {!! Form::select2Field('Select2 Async', 'select2-async', [], 2, ['select2' => ['ajax--url' => '/select2/data']]) !!}
    {!! Form::select2Field('Select2 Async Multiple', 'select2-async-multiple', [], [2, 3], ['select2' => ['ajax--url' => '/select2/data'], 'multiple' => true]) !!}

    {!! Form::select2Field('Select2 Async Without Init Call', 'select2-async-without-init-call', [5 => 'Speaking from Among the Bones'], 5, ['select2' => ['ajax--url' => '/select2/data']]) !!}
    {!! Form::select2Field('Select2 Async Multiple Without Init Call', 'select2-async-multiple-without-init-call', [5 => 'Speaking from Among the Bones', 8 => 'Wicked'], [5, 8], ['select2' => ['ajax--url' => '/select2/data'], 'multiple' => true]) !!}

    {!! Form::close() !!}
@endsection