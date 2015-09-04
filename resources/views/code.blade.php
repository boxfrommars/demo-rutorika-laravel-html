@extends('layout')

@section('content')
    <h2 class="page-header">Code fields</h2>

    {!! Form::open(['class' => 'form-horizontal']) !!}

    {!! Form::codeField('HTML, monokai theme', 'codeField', null, ['mode' => 'html', 'theme' => 'monokai']) !!}
    {!! Form::codeField('Javascript, default theme', 'codeField', '
$(\'.select2\').each(function () {
  var $select = $(this);

  var currentValue = $select.val();
  var value = $select.data(\'value\');
  var url = $select.data(\'ajax--url\');

  // if async, selected, and no option with selected value exists -- then prefetching selected item from server
  // and add fetched option to select.
  if (url && value && !currentValue) {
    var request = $.ajax({
      url: url + \'/init\',
      data: {
        ids: value
      }
    });

    request.then(function (response) {
      response.results.forEach(function (result) {
        var $option = $(\'<option>\')
          .text(result.text)
          .attr(\'value\', result.id)
          .prop(\'selected\', true);

        $select.prepend($option);
      });

      initSelect2($select);
    });

  } else {
    initSelect2($select);
  }

  function initSelect2($select) {
    $select.select2({
      theme: \'bootstrap\'
    });
  }
});


    ', ['mode' => 'javascript']) !!}

    {!! Form::codeField('PHP, chaos theme', 'codeField', '
&lt;?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It\'s a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get(\'/\', function () {
    return view(\'general\');
});
Route::get(\'/custom\', function () {
    return view(\'custom\');
});

Route::get(\'/maps\', function () {
    return view(\'maps\');
});

Route::get(\'/code\', function () {
    return view(\'code\');
});

Route::get(\'/image\', function () {
    \$article = new \\App\\Entities\\Article();
    \$article->title = \'Test Article\';
    \$article->image = \'61/26/fd67890c900ab9ac41ec644db19a.png\';
    \$article->file = \'61/26/fd67890c900ab9ac41ec644db19a.png\';
    return view(\'image\', [\'article\' => \$article]);
});

Route::get(\'/select2\', function () {
    return view(\'select2\', []);
});

Route::get(\'/select2/data\', \'Select2Controller@select2search\');
Route::get(\'/select2/data/init\', \'Select2Controller@select2searchInit\');

Route::post(\'/upload\', \'\\Rutorika\\Html\\Http\\UploadController@upload\');

Route::post(\'/\', function (\\Illuminate\\Http\\Request \$request) {

    \$validator = Validator::make(\$request->all(), [
        \'textField\' => \'required\',
        \'textareaField\' => \'required\',
        \'passwordField\' => \'required\',
        \'checkboxField\' => \'required\',
        \'numberField\' => \'required\',
        \'selectField\' => \'required\',
        \'staticField\' => \'required\',
        \'submitField\' => \'required\',
    ]);

    if (\$validator->fails()) {
        return redirect(\'/\')
            ->withErrors(\$validator)
            ->withInput();
    } else {
        return redirect(\'/\');
    }
});
    ', ['mode' => 'php', 'theme' => 'chaos']) !!}


    {!! Form::codeField('MySQL, github theme', 'codeField', '
CREATE USER \'demohtml\'@\'localhost\' IDENTIFIED BY \'demohtml\';
CREATE DATABASE demohtml;
GRANT ALL PRIVILEGES ON demohtml . * TO \'demohtml\'@\'localhost\';
FLUSH PRIVILEGES;
    ', ['mode' => 'mysql', 'theme' => 'github']) !!}

    {!! Form::close() !!}
@endsection