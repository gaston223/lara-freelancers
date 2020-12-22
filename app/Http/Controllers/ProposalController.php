<?php

namespace App\Http\Controllers;

use App\Models\CoverLetter;
use App\Models\Job;
use App\Models\Proposal;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function store(Request $request, Job $job)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return redirect()->route('home')
                ->withErrors($validator)
                ->withInput();
        }
        $proposal =  Proposal::create([
            'job_id' => $job->id,
            'validated' => false
        ]);

      CoverLetter::create([
          'proposal_id' => $proposal->id,
          'content' => $request->input('content')
      ]);

      return redirect()->route('jobs.index');
    }
}
