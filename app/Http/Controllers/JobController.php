<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * @return view
     */
    public function index()
    {
        $jobs = Job::online()->latest()->get();

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    /**
     * @param Job $id
     * 
     * @return $id
     */
    public function show(Job $id)
    {
        return view('jobs.show' ,[
            'job' => $id
        ]) ; 
    }
}
