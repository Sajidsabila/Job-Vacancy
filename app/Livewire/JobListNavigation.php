<?php

namespace App\Livewire;

use Livewire\Component;

class JobListNavigation extends Component
{
    public function navigateToJobList()
    {
        $this->emit('redirect', url('/job-list'));
    }
    public function index()
    {
        return view('job-seekers.job-listing');
    }
}
