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
Route::get('/custom', function () {
    return view('custom');
});
Route::get('/image', function () {
    $article = new \App\Entities\Article();
    $article->title = 'Test Article';
    $article->image = '61/26/fd67890c900ab9ac41ec644db19a.png';
    $article->file = '61/26/fd67890c900ab9ac41ec644db19a.png';
    return view('image', ['article' => $article]);
});


Route::get('/select2', function () {
    return view('select2', []);
});

$select2Data = [
    ['id' => 1, 'text' => 'The Sweetness at the Bottom of the Pie'],
    ['id' => 2, 'text' => 'The Weed That Strings the Hangman\'s Bag'],
    ['id' => 3, 'text' => 'A Red Herring Without Mustard'],
    ['id' => 4, 'text' => 'I Am Half-Sick of Shadows'],
    ['id' => 5, 'text' => 'Speaking from Among the Bones'],
    ['id' => 6, 'text' => 'The Dead in Their Vaulted Arches'],
    ['id' => 7, 'text' => 'As Chimney Sweepers Come to Dust'],
];

Route::get('/select2/data', function (\Illuminate\Http\Request $request) use ($select2Data) {
    $query = $request->get('q');
    if (!$query) {
        $results = $select2Data;
    } else {
        $results = array_filter($select2Data, function ($item) use ($query) {
            return strpos(mb_strtolower($item['text']), mb_strtolower($query)) === 0;
        });
    }
    return ['results' => array_values($results)];
});

//Route::get('/select2/data/init', function (\Illuminate\Http\Request $request) use ($select2Data) {
//    $value = (array) $request->get('value', []);
//    $results = array_filter($select2Data, function ($item) use ($value) {
//        return in_array($item['id'], $value);
//    });
//    return ['results' => $results];
//});

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
