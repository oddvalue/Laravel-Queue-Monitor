<?php

namespace romanzipp\QueueMonitor\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use romanzipp\QueueMonitor\Services\QueueMonitor;

class ShowQueueMonitorController extends Controller
{
    use ValidatesRequests;

    public function __invoke(Request $request)
    {
        $data = $request;
        $this->validate($request, [
            'only_failed' => ['filled'],
        ]);

        $filters = [
            'onlyFailed' => (bool) Arr::get($data, 'only_failed'),
        ];

        $jobs = QueueMonitor::getModel()
            ->newQuery()
            ->when($filters['onlyFailed'], static function (Builder $builder) {
                return $builder->where('failed', 1);
            })
            ->ordered()
            ->paginate(
                config('queue-monitor.ui.per_page')
            )
            ->appends(
                $request->all()
            );

        return view('queue-monitor::jobs', [
            'jobs' => $jobs,
            'filters' => $filters,
        ]);
    }
}
