<?php

namespace romanzipp\QueueMonitor\Tests\Support;

use romanzipp\QueueMonitor\Traits\IsMonitored;

class MonitoredJobWithMergedData extends BaseJob
{
    use IsMonitored;

    public function handle()
    {
        $this->queueData([
            'foo' => 'foo',
        ]);

        $this->queueData([
            'bar' => 'bar',
        ], true);
    }
}
