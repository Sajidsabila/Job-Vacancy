<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InteviewSchedule extends Mailable
{
    use Queueable, SerializesModels;

    public $jobHistory;

    public function __construct($jobHistory)
    {
        $this->jobHistory = $jobHistory;
    }

    public function build()
    {
        return $this->view('company.job.mail-interview')
            ->with([
                'jobTitle' => $this->jobHistory->job->title,
                'interviewDate' => $this->jobHistory->interview_date,
            ]);
    }
}
