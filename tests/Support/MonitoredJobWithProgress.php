<?php

namespace romanzipp\QueueMonitor\Tests\Support;

use romanzipp\QueueMonitor\Traits\IsMonitored;

class MonitoredJobWithProgress extends BaseJob
{
    use IsMonitored;

    public $progress;

    public function __construct(int $progress)
    {
        $this->progress = $progress;
    }

    public function handle()
    {
        $this->queueProgress(
            $this->progress
        );
    }
}
