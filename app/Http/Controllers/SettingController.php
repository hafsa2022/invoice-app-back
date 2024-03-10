<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\ISettingService;

class SettingController extends Controller
{
    private ISettingService $settingService;

    public function __construct(ISettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function getSetting($id)
    {
        $setting = $this->settingService->getSetting($id);
        return response()->json($setting);
    }

    public function updateSetting(Request $request)
    {
         return response()->json($this.settingService->updateSetting($request));
    }
}
