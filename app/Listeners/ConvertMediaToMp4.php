<?php

namespace App\Listeners;

use App\Events\MediaUploaded;
use App\Jobs\ConvertMediaToMp4Job;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class ConvertMediaToMp4 implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(MediaUploaded $event)
    {
        // //Tiến hành convert file, sử dụng queue convert-media <== thay đổi tên tuỳ ý
        // ConvertMediaToMp4Job::dispatch($event->uploadedFileName)->onQueue('convert-media');
        // //Một Listener có thể có nhiều jobs
        Log::info($event->uploadedFileName);
    }
}
