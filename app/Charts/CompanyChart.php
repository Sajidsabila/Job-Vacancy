<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class CompanyChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): LarapexChart
    {
        // Ambil data jumlah company per hari dalam satu bulan terakhir
        $companyData = Company::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
            ->whereBetween('created_at', [now()->subDays(29)->startOfDay(), now()->endOfDay()])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Siapkan data untuk chart
        $data = $companyData->pluck('total')->toArray();
        $labels = $companyData->pluck('date')->toArray();

        // Buat dan kembalikan chart sebagai area chart
        return $this->chart->areaChart()
            ->setTitle('Company Registrations Distribution (Last 30 Days)')
            ->setXAxis($labels)
            ->addData('Companies', $data)
            ->setColors(['#f0ad4e'])
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
