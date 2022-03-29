<?php

namespace App\Jobs;

use App\Contracts\ParserContract;
use http\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Queue\SerializesModels;

class NewsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $link;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string  $link)
    {
        $this->link  = $link;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ParserContract $parser)
    {
        $data =  $parser->getParsedMaterial($this->link);
        try {
            $parser->storeParsedMaterial($data);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
