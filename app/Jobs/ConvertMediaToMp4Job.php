<?php

namespace App\Jobs;

use FFMpeg\FFMpeg;
use FFMpeg\Format\Video\X264;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Storage;

class ConvertMediaToMp4Job implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $uploadedFileName;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($uploadedFileName)
    {
        $this->uploadedFileName = $uploadedFileName;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ffmpeg = FFMpeg::create();
        // In this example we have a path for the videos
        $mediaDirectory = Storage::disk('media')->getAdapter()->getPathPrefix();
        // Open the video providing the absolute path
        $video = $ffmpeg->open($mediaDirectory.$this->uploadedFileName);         
        // Fix for error "Encoding failed : Can't save to X264"
        // See: https://github.com/PHP-FFMpeg/PHP-FFMpeg/issues/310
        $mp4Format = new X264();
        $mp4Format->setAudioCodec("libmp3lame");
        $uploadedFileNameWithoutExtension = pathinfo($this->uploadedFileName, PATHINFO_FILENAME);
        
        // Save the video in the same directory with the new format
        $video->save($mp4Format, $mediaDirectory. "{$uploadedFileNameWithoutExtension}.mp4");

        // Delete non-mp4 file
        Storage::disk('media')->delete($this->uploadedFileName);
    }
}
