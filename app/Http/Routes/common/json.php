<?php


Route::controller('json','\App\Http\Controllers\common\json\Json',
    [
        'getJsonFromUrl'=>'common.json.jsonFromUrl'
    ]);
