<?php

namespace romanzipp\QueueMonitor\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use romanzipp\QueueMonitor\Models\Monitor;

class DeleteMonitorController extends Controller
{
    public function __invoke(Request $request, Monitor $monitor)
    {
        $monitor->delete();

        return redirect()->action('\\'.ShowQueueMonitorController::class.'@__invoke');
    }
}
