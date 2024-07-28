<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PurchasedItem;
use App\Traits\Dashboard\AnalyticsAttendanceByAge;
use App\Traits\Dashboard\AnalyticsAttendanceByCountry;
use App\Traits\Dashboard\AnalyticsTopMuseum;
use App\Traits\Dashboard\AnalyticsTrait;
use App\Traits\Reports\CheckReportType;
use App\Traits\Reports\ReportTrait;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
  // use ReportTrait, CheckReportType, AnalyticsTrait;
  use AnalyticsTrait, AnalyticsAttendanceByCountry, AnalyticsAttendanceByAge, AnalyticsTopMuseum;

  public function __invoke()
  {

    $ticket_type = $this->ticketsType();
    $total_revenue = json_encode($this->totalRevenue());
    $attendance_by_country = json_encode($this->forAllMuseum()['statistics']);
    $attendance_by_country_arr = $this->forAllMuseum()['array'];
    $attendance_by_age_arr = json_encode($this->groupAgeForAllMuseum()['age_analytics']);
    $age_total_amount = $this->groupAgeForAllMuseum()['age_total_amount'];
    $age_total_amount_asoc_arr = $this->groupAgeForAllMuseum()['age_analytics_asoc_arr'];
    $get_top_museum = $this->getTopMuseum();

    return view("content.dashboard.dashboards-analytics", compact('ticket_type', 'total_revenue', 'attendance_by_country', 'attendance_by_country_arr', 'attendance_by_age_arr', 'age_total_amount', 'age_total_amount_asoc_arr', 'get_top_museum'));

  }

}
