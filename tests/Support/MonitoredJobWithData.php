<?php

namespace romanzipp\QueueMonitor\Tests\Support;

use romanzipp\QueueMonitor\Traits\IsMonitored;

class MonitoredJobWithData extends BaseJob
{
    use IsMonitored;

    public function handle()
    {
        $this->queueData([
            'foo' => 'foo',
        ]);

        $this->queueData([
            'foo' => 'bar',
        ]);
    }
}
