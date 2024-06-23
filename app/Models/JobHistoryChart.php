<?php

namespace App\Models;

use App\Models\JobHistory;
use Illuminate\Support\Facades\Auth;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class JobHistoryChart 
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): LarapexChart
    {
        $user = Auth::user(); // Dapatkan user yang sedang login

        // Ambil data jumlah job history berdasarkan company_id dari database
        $jobhistory = JobHistory::join('jobs', 'job_histories.job_id', 'jobs.id')
            ->where('jobs.company_id', $user->id)
            ->select('jobs.id', DB::raw('count(*) as total'))
            ->groupBy('jobs.id')
            ->get();

        // Siapkan data untuk chart
        $data = $jobhistory->pluck('total')->toArray();
        $labels = $jobhistory->pluck('id')->toArray();

        // Buat dan kembalikan chart
        return $this->chart->pieChart()
            ->setTitle('Job History Distribution')
            ->setSubtitle('Job IDs and their counts')
            ->addData($data)
            ->setLabels($labels);
    }
}
