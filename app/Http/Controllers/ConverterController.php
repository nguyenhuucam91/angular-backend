<?php

namespace App\Http\Controllers;

use App\Events\MediaUploaded;
use App\Jobs\ConvertMediaToMp4Job;
use Illuminate\Http\Request;

class ConverterController extends Controller
{
    public function index() 
    {
        return view("converter.index");
    }

    /**
     * Store and convert file in server
     */
    public function store(Request $request)
    {
        $fileUploaded = $request->file('file');

        // store file at server, using media disk filesystem
        $fileUploaded->storeAs(null, $fileUploaded->getClientOriginalName(), 'media');

        //call job to begin convert uploaded file
        ConvertMediaToMp4Job::dispatch($fileUploaded->getClientOriginalName())->onQueue('convert-media');

        return 'done';
    }

    public function test()
    {
        MediaUploaded::dispatch("1");
    }
}
