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

function resource_path($filename)
{
    return trim(env('RESOURCE_PATH', 'assets/storage'), '/') . DIRECTORY_SEPARATOR . $filename;
}

Route::get('/', function () {
    return view('general');
});
Route::get('/custom', function () {
    return view('custom');
});
Route::get('/image', function (){
    $article = new \App\Entities\Article();
    $article->title = 'Test Article';
    $article->image = 'http://lorempixel.com/800/500/fashion/';
    $article->file = 'http://lorempixel.com/800/500/fashion/';
    return view('image', ['article' => $article]);
});

Route::post('/upload/image', 'UploadController@image');

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
