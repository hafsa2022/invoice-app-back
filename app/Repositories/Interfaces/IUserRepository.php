<?php

namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;
// use App\Models\User;


interface IUserRepository
{
    public function getUser(Request $request);

    // public function AddUser(User $user);
    public function updateInfo(Request $request);


}
