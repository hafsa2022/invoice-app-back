<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IUserRepository;
use App\Models\User;
// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;



class UserRepository implements IUserRepository
{
    protected $model;

    public function _construct(User $user)
    {
        $this->model = $user;
    }

    public function AddUser(User $user)
    {
        $user->save();
        return $user;
    }

    public function getUser(Request $request)
    {
        $searchedUser =  User::where('email', $request->email)->first();
        return $searchedUser;

    }


    public function updateInfo(Request $request)
    {
        $user = user::find($request->id);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),

        ]);

        return $user;
    }
}
?>
