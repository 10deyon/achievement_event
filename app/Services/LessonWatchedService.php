<?php

namespace App\Services;

use Exception;

class LessonWatchedService 
{
    protected $scheduleRepo;
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->scheduleRepo = $scheduleRepo;
    }

    /**
     * Filter service that checks by the provided value
     *
     * @param Model $model
     * @param  \Illuminate\Http\Request  $request
     * @throws \Exception
     * @return Array $query
     */
    public function unlockAchievement($request)
    {
        
    }

    /**
     * Check the status of a shift before assignment
     *
     * @param $shift
     * @param  \Illuminate\Http\Request  $request
     * @throws \Exception
     * @return void
     */
    static function checkShiftStatus($shift, $request)
    {

    }
}