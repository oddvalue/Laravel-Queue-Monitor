<?php

namespace romanzipp\QueueMonitor\Tests\Support;

use romanzipp\QueueMonitor\Traits\IsMonitored;

class MonitoredJobWithMergedDataConflicting extends BaseJob
{
    use IsMonitored;

    public function handle()
    {
        $this->queueData([
            'foo' => 'old',
        ]);

        $this->queueData([
            'foo' => 'new',
        ], true);
    }
}
