<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('general');
});
Route::get('/color', function () {
    return view('color');
});

Route::get('/maps', function () {
    return view('maps');
});

Route::get('/code', function () {
    return view('code');
});

Route::get('/upload', function () {
    $article = new \App\Entities\Article();
    $article->title = 'Test Article';
    $article->image = '61/26/fd67890c900ab9ac41ec644db19a.png';
    $article->file = '61/26/fd67890c900ab9ac41ec644db19a.png';
    return view('upload', ['article' => $article]);
});

Route::get('/select2', function () {
    return view('select2', []);
});

Route::get('/select2/data', 'Select2Controller@select2search');
Route::get('/select2/data/init', 'Select2Controller@select2searchInit');

Route::post('/upload', '\Rutorika\Html\Http\UploadController@upload');

Route::post('/', function (\Illuminate\Http\Request $request) {

    $validator = Validator::make($request->all(), [
        'textField' => 'required',
        'textareaField' => 'required',
        'passwordField' => 'required',
        'checkboxField' => 'required',
        'numberField' => 'required',
        'selectField' => 'required',
        'staticField' => 'required',
        'submitField' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withErrors($validator)
            ->withInput();
    } else {
        return redirect('/');
    }
});
