<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {
        $pageViews = Event::selectRaw("COUNT(*) as views, attribute as page, DATE(created_at) as date")
            ->groupBy(['date', 'attribute'])
            ->orderBy('date')
            ->where('useragent', 'not like', '%bot%')
            ->where('useragent', 'not like', '%python-requests%')
            ->where('useragent', 'not like', '%http%')
            ->where('useragent', 'not like', '%node-fetch%')
            ->where('useragent', 'not like', '%postman%')
            ->where('useragent', 'not like', '%curl%')
            ->get();

        $uniqueVisitors = Event::selectRaw("COUNT(DISTINCT visitorid) as unique_visitors, DATE(created_at) as date")
            ->groupBy(['date'])
            ->orderBy('date')
            ->where('useragent', 'not like', '%bot%')
            ->where('useragent', 'not like', '%python-requests%')
            ->where('useragent', 'not like', '%http%')
            ->where('useragent', 'not like', '%node-fetch%')
            ->where('useragent', 'not like', '%postman%')
            ->where('useragent', 'not like', '%curl%')
            ->get();

        return response()->json([
            'page_views' => $pageViews,
            'unique_visitors' => $uniqueVisitors
        ]);
    }
}
