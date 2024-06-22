<?php
// File: app/Charts/JobHistoryChart.php

namespace App\Charts;

use App\Models\JobHistory;
use App\Models\Job; // tambahkan import untuk model Job
use Illuminate\Support\Facades\Auth; // tambahkan import untuk Auth
use ArielMejiaDev\LarapexCharts\LarapexChart;
use ArielMejiaDev\LarapexCharts\PieChart;

class JobHistoryChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $user = Auth::user(); // dapatkan user yang sedang login

        // Ambil data jumlah job history berdasarkan company_id dari database
        $jobhistory = JobHistory::join('jobs', 'job_histories.job_id', 'jobs.id')
            ->where('jobs.company_id', $user->id)
            ->select('jobs.id', \DB::raw('count(*) as total'))
            ->groupBy('jobs.id')
            ->get();

        // Siapkan data untuk chart
        $data = $jobhistory->pluck('total')->toArray();
        $labels = $jobhistory->pluck('job_id')->toArray();

        // Buat dan kembalikan chart
        return $this->chart->pieChart()
            ->setTitle('Job History Distribution')
            ->setSubtitle('Job IDs and their counts')
            ->addData($data)
            ->setLabels($labels);
    }
}