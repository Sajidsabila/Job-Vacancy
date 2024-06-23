<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationIncomingApplication extends Mailable
{
    use Queueable, SerializesModels;

    public $job;
    public $jobseekerName; // Ganti dengan $jobseekerName untuk nama jobseeker
    public $gender; // Ganti dengan $jobseekerName untuk nama jobseeker
    public $email; // Ganti dengan $jobseekerName untuk nama jobseeker
    public $phone; // Ganti dengan $jobseekerName untuk nama jobseeker
    public $userEmail; // Ganti dengan $jobseekerName untuk nama jobseeker

    public function __construct($job, $jobseeker, $userEmail)
    {
        $this->job = $job;
        $this->jobseekerName = $jobseeker->first_name . ' ' . $jobseeker->last_name; // Menggunakan $jobseeker untuk mendapatkan
        $this->email = $jobseeker->email; // Menggunakan $jobseeker untuk mendapatkan
        $this->gender = $jobseeker->gender; // Menggunakan $jobseeker untuk mendapatkan
        $this->phone = $jobseeker->phone;
        $this->userEmail = $userEmail;// Menggunakan $jobseeker untuk mendapatkan

    }
    public function build()
    {
        return $this->view('company.job.mail-apllicant')
            ->with([
                'job' => $this->job,
                'jobseekerName' => $this->jobseekerName,
                'email' => $this->userEmail, // Menggunakan $jobseeker untuk mendapatkan
                'gender' => $this->gender, // Menggunakan $jobseeker untuk mendapatkan
                'phone' => $this->phone,
                // Mengirimkan jobseekerName ke view
            ]);
    }
}