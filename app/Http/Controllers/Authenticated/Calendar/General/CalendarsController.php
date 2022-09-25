<?php

namespace App\Http\Controllers\Authenticated\Calendar\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Calendars\General\CalendarView;
use App\Models\Calendars\ReserveSettings;
use App\Models\Calendars\Calendar;
use App\Models\USers\User;
use Auth;
use DB;

class CalendarsController extends Controller
{
    public function show($reserve_setting_id){
        $calendar = new CalendarView(time());
        return view('authenticated.calendar.general.calendar', compact('calendar'));
    }

    public function reserve(Request $request){
        DB::beginTransaction();
        try{
            $getPart = $request->getPart;
            $getDate = $request->getData;
            $reserveDays = array_filter(array_combine($getDate, $getPart));
            foreach($reserveDays as $key => $value){
                $reserve_settings = ReserveSettings::where('setting_reserve', $key)->where('setting_part', $value)->first();
                $reserve_settings->decrement('limit_users');
                $reserve_settings->users()->attach(Auth::id());
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }
        return redirect()->route('calendar.general.show', ['user_id' => Auth::id()]);
    }

    public function delete(Request $request){
        $deletePart = ReserveSettings::find($request->reserve_setting_id)->setting_part;
        $deleteDate = ReserveSettings::find($request->reserve_setting_id)->setting_reserve;
        $delete_settings = ReserveSettings::where('setting_reserve', $deleteDate)->where('setting_part', $deletePart)->first();
                $delete_settings->increment('limit_users');
                $delete_settings->users()->attach(Auth::id());

        $reserve_settings = User::find(Auth::id());
        $reserve_settings->reserveSettings()->detach($request->reserve_setting_id);

        return redirect()->route('calendar.general.show', ['user_id' => Auth::id()]);
    }
}
