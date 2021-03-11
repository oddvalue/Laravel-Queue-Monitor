<?php

namespace romanzipp\QueueMonitor\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use romanzipp\QueueMonitor\Models\Contracts\MonitorContract;
use romanzipp\QueueMonitor\Services\QueueMonitor;

class PurgeMonitorsController extends Controller
{
    public function __invoke(Request $request)
    {
        $model = QueueMonitor::getModel();

        $model->newQuery()->delete();

        return redirect()->action('\\'.ShowQueueMonitorController::class.'@__invoke');
    }
}
