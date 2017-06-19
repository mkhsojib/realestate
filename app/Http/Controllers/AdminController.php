<?php

namespace App\Http\Controllers;

use App\Building;
use App\Contact;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $active_buildings_count = count_inactive_buildings(1);
        $inactive_buildings_count = count_inactive_buildings(0);
        $latest_users = User::take('10')->orderBy('id', 'desc')->get();
        $latest_buildings = Building::take('10')->orderBy('id', 'desc')->get();
        $users_count = User::count();
        $emails_count = Contact::count();
        $year = date('Y');
        $array = [];
        $chart = Building::select(DB::raw('COUNT(*) as count, month'))
            ->where('year', date('Y'))
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get()
            ->toArray();

        if(isset($chart[0]['month'])){
            for($i = 1; $i < $chart[0]['month']; $i++){
                $array[] = 0;
            }
        }

        $new_array = array_merge($array, $chart);


        return view('admin/home/index', compact(
            'active_buildings_count',
            'inactive_buildings_count',
            'latest_users',
            'latest_buildings',
            'users_count',
            'emails_count',
            'new_array',
            'year'
        ));
    }

    public function Chart(Request $request)
    {
        $year = date('Y');
        $array = [];
        $chart = Building::select(DB::raw('COUNT(*) as count, month'))
            ->where('year', date('Y'))
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get()
            ->toArray();

        if(isset($chart[0]['month'])){
            for($i = 1; $i < $chart[0]['month']; $i++){
                $array[] = 0;
            }
        }

        $new_array = array_merge($array, $chart);

        return view('admin/home/chart', compact('year','chart', 'new_array'));
    }

    public function YearChart(Request $request)
    {
        $year = $request->year;
        $chart = Building::select(DB::raw('COUNT(*) as count, month'))
                         ->where('year', $year)
                         ->groupBy('month')
                         ->orderBy('month', 'asc')
                         ->get()
                         ->toArray();
        $array = [];

        if(isset($chart[0]['month'])){
            for($i = 1; $i < $chart[0]['month']; $i++){
                $array[] = 0;
            }
        }

        $new_array = array_merge($array, $chart);

        return view('admin/home/chart', compact('year','chart', 'new_array'));
    }
}
