<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\JobSeeker;
use Illuminate\Support\Facades\DB;

class JobSeekerChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): LarapexChart
    {
        // Ambil data jumlah jobseeker per hari dalam satu bulan terakhir
        $jobSeekerData = JobSeeker::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
            ->whereBetween('created_at', [now()->subDays(29)->startOfDay(), now()->endOfDay()])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Siapkan data untuk chart
        $data = $jobSeekerData->pluck('total')->toArray();
        $labels = $jobSeekerData->pluck('date')->toArray();

        // Buat dan kembalikan chart sebagai area chart
        return $this->chart->areaChart()
            ->setTitle('Job Seeker Registration Trend (Last 30 Days)')
            ->setXAxis($labels)
            ->addData('Job Seekers', $data)
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
