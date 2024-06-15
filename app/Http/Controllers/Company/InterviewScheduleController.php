<?php

namespace App\Http\Controllers\Company;

use App\Models\Job;
use App\Models\JobHistory;
use Illuminate\Http\Request;
use App\Mail\InteviewSchedule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;


class InterviewScheduleController extends Controller
{
    public function edit(string $id)
    {
        $jobHistory = JobHistory::findOrFail($id);
        $data = ([
            "title" => "Jadwal Interview",
            "jobHistory" => $jobHistory
        ]);

        return view("company.job.interview-form", $data);
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'interview_date' => 'required|date',
            'interview_time' => 'required'
        ]);
        try {
            $jobHistory = JobHistory::findOrFail($id);
            $jobHistory->interview_date = $request->input('interview_date');
            $jobHistory->interview_time = $request->input('interview_time');
            $jobHistory->save();

            Mail::to($jobHistory->jobseeker->user->email)->send(new InteviewSchedule($jobHistory));

            Alert::success("Berhasil", "Input Data Tanggal Interview Berhasil dan email telah dikirim.");
            return Redirect::to('companie/lowongan-kerja/' . $jobHistory->job_id);
        } catch (\Throwable $th) {
            Alert::error("Error", $th->getMessage());
            return back();
        }
    }
}
