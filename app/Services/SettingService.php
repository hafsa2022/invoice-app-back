<?php

namespace App\Services;
use App\Services\Interfaces\ISettingService;
use App\Repositories\Interfaces\ISettingRepository;
use Illuminate\Http\Request;

class SettingService implements ISettingService
{
    protected $repository;

    public function __construct(ISettingRepository $settingRepository)
    {
        $this->repository = $settingRepository;
    }


    public function getSetting($id)
    {
        $setting = $this->repository->getSetting($id);

        return $setting;
    }

    // public function updateSetting(Request $request)
    // {
    //     return $this->repository->getSetting($request);

    // }

}
