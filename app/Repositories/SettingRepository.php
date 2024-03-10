<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ISettingRepository;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class SettingRepository implements ISettingRepository
{
    public function getSetting($id)
    {
        $setting = DB::table('settings')
                    ->where('settings.id',$id)
                    ->get();
         return $setting;
    }

}
