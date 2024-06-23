<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\JobHistory;
use Illuminate\Support\Facades\Auth;
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

        // Ambil data jumlah job history per hari dalam satu bulan terakhir berdasarkan company_id dari database
        $jobHistoryData = JobHistory::join('jobs', 'job_histories.job_id', 'jobs.id')
            ->where('jobs.company_id', $user->id)
            ->select(DB::raw('DATE(job_histories.created_at) as date'), DB::raw('count(*) as total'))
            ->whereBetween('job_histories.created_at', [now()->subDays(29)->startOfDay(), now()->endOfDay()])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Siapkan data untuk chart
        $data = $jobHistoryData->pluck('total')->toArray();
        $labels = $jobHistoryData->pluck('date')->toArray();

        // Buat dan kembalikan chart sebagai area chart
        return $this->chart->areaChart()
            ->setTitle('Job History Distribution (Last 30 Days)')
            ->setXAxis($labels)
            ->addData('Job Histories', $data)
            ->setColors(['#5bc0de'])
            ->setOptions([
                'chart' => [
                    'toolbar' => [
                        'show' => false
                    ]
                ],
                'xaxis' => [
                    'type' => 'datetime',
                    'labels' => [
                        'datetimeUTC' => false
                    ]
                ],
                'dataLabels' => [
                    'enabled' => false
                ]
            ]);
    }
}
