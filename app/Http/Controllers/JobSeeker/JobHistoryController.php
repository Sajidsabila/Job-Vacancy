<?php

namespace App\Http\Controllers\JobSeeker;

use App\Models\JobSeeker;
use App\Models\JobHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Configuration;
use Illuminate\Support\Facades\Auth;

class JobHistoryController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $configurations = Configuration::first();

        $query = JobHistory::with(['jobseeker', 'job'])
            ->where('job_seeker_id', $user->id);

        // Menghitung jumlah total riwayat pekerjaan
        $historycount = $query->count();

        // Menghitung jumlah riwayat pekerjaan berdasarkan status
        $countviewed = $query;
        $countreject = $query;
        $countinterview = $query;
        $countaccept = $query;

        // Mengambil daftar status unik untuk filter
        $statuses = JobHistory::select('status')->distinct()->get();
        $jobhistories = $query->paginate(5);

        // Menerapkan filter status jika ada
        $filterstatus = $request->input('statusFilter');
        if ($filterstatus) {
            $query->where('status', $filterstatus);
        }

        // Mengambil data riwayat pekerjaan dengan pagination
        $jobhistories = $query->paginate(5);
        // dd($query->get()[1]);
        // Menyiapkan data untuk dikirimkan ke view
        $data = [
            "title" => "Data History Lamaran",
            "jobhistories" => $jobhistories,
            "configurations" => $configurations,
            "historycount" => $historycount,
            'countviewed' => $countviewed->where('status', 'Lamaran Dilihat')->count(),
            'countreject' => $countreject->where('status', 'Lamaran Ditolak')->count(),
            'countinterview' => $countinterview->where('status', 'Proses Interview')->count(),
            'countaccept' => $countaccept->where('status', 'Lamaran Diterima')->count(),
            "selectedStatus" => $filterstatus,
            "statuses" => $statuses,
        ];

        return view("job-seekers.job-history", $data);
    }

}