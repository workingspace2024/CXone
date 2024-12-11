<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ReportController extends Controller
{
    public function EvaluationSummaryReport(Request $request)
    {

        $this->checkConnection();
        $Team=$this->LoadTeamName();
        $V_EvaluationSumaryReport = DB::select('SELECT * FROM V_EvaluationSumaryReport');
        // return $V_EvaluationSumaryReport;
        return view('evaluation_summay_report', compact('V_EvaluationSumaryReport','Team'));

    }

    public function DailyEndCallRecommendToService(Request $request)
    {

        $this->checkConnection();
        // $data = DB::select('SELECT * FROM V_EvaluationSumaryReport');
        // return $data;
        return view('daily_end_call_recommend_to_service');

    }

    public function LoadTeamName()
    {

        $Team = DB::select('SELECT DISTINCT Team FROM Agent');
        return $Team;

    }

    public function InsertandUpdateCustomFields(Request $request)
    {

    }

    public function checkConnection()
    {
        try {
            DB::connection()->getPdo();
            if (DB::connection()->getDatabaseName()) {
                //  echo "Yes! Successfully connected to the DB: " . DB::connection()->getDatabaseName();
            } else {
                die("Could not find the database. Please check your configuration.");
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            //   die("Could not open connection to database server.  Please check your configuration.");
        }
    }
}
