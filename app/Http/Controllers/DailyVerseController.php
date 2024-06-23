<?php

namespace App\Http\Controllers;

use App\Models\DailyVerse;
use App\Http\Requests\StoreDailyVerseRequest;
use App\Http\Requests\UpdateDailyVerseRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DailyVerseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $locale = $request->session()->get('locale') ?? 'en';

        $dailyVerse = DailyVerse::where('lang', $locale)
                                 ->whereDate('created_at', Carbon::today())
                                 ->first();
        return $dailyVerse;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDailyVerseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DailyVerse $dailyVerse)
    {
        return $dailyVerse;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DailyVerse $dailyVerse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDailyVerseRequest $request, DailyVerse $dailyVerse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DailyVerse $dailyVerse)
    {
        //
    }
}
