<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\CoverLetter;
use App\Models\Job;
use App\Models\Message;
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

    public function confirm(Request $request)
    {

        $proposal = Proposal::findOrFail($request->proposal);
        //dd($proposal);
        $proposal->fill(['validated' => 1]);
        if($proposal->isDirty()){
            $proposal->save();
            $conversation = Conversation::create([
                'from' => auth()->user()->id,
                'to' => $proposal->user->id,
                'job_id' => $proposal->job_id
            ]);
            Message::create([
                'user_id' => auth()->user()->id,
                'conversation_id' => $conversation->id,
                'content' => "Bonjour j'ai validé votre offre"
            ]);
            return redirect()->route('jobs.index');
           // dd('Creation dune nouvelle conversation');
        }
    }
}
