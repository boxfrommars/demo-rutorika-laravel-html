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
    return view('all');
});

Route::post('/', function () {

});

Route::get('/general', function () {
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

Route::get('/date', function () {
    return view('date');
});

Route::get('/upload-fields', function () {
    $article = new \App\Entities\Article();
    $article->title = 'Test Article';
    $article->image = '';
    $article->file = '';

    $article->imageHelp = '62/2e/0cae2ad0998d522117312b590583.jpg';
    $article->fileHelp = '62/2e/0cae2ad0998d522117312b590583.jpg';
    return view('upload', ['article' => $article]);
});

Route::get('/select2', function () {
    return view('select2', []);
});

Route::get('/select2/data', 'Select2Controller@select2search');
Route::get('/select2/data/init', 'Select2Controller@select2searchInit');

Route::post('/upload', '\Rutorika\Html\Http\UploadController@upload');

Route::post('/general', function (\Illuminate\Http\Request $request) {

    $validator = Validator::make($request->all(), [
        'textField' => 'required',
        'textareaField' => 'required',
        'passwordField' => 'required',
        'checkboxField' => 'required',
        'numberField' => 'required',
        'selectField' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withErrors($validator)
            ->withInput();
    } else {
        return redirect('/');
    }
});

Route::post('/', function (\Illuminate\Http\Request $request) {

    $validator = Validator::make($request->all(), [
        'text' => 'required',
        'textarea' => 'required',
        'checkbox' => 'required',
        'number' => 'required',
        'select' => 'required',

        'image' => 'required',
        'file' => 'required',
        'code' => 'required',
        'color' => 'required',
        'date' => 'required',
        'time' => 'required',
        'datetime' => 'required',
        'placemark' => 'required',
        'select2' => 'required',
        'select2-multiple' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withErrors($validator)
            ->withInput();
    } else {
        return redirect('/');
    }
});
