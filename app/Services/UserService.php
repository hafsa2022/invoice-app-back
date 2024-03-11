<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Services\Interfaces\IUserService;
use App\Repositories\Interfaces\IUserRepository;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\App;



class UserService implements IUserService
{
    protected $repository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }
    public function addUser(Request $request)
    {
        $user = new User();
        $request->validate([
            'name' => 'required|max:255',
            'email'=>'required|email:rfc,dns|unique:users,email',
            'password' => [
                'required',
                Password::min(6)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
            'password_confirmation' => 'required|same:password',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user = $this->repository->addUser($user);

        return $user;
    }

    public function getUser(Request $request){

        $credentials = ['email'=>$request->email,'password'=>$request->password];
        if(! $token = auth()->attempt($credentials)){
            return response()->json(['error'=>'Email Or Password is not matches'],401);

        }

        $user = $this->repository->getUser($request);
        return response()->json([
            "token"=>$token,
            "user" => $user,
            // "lang" => App::getLocale()
        ]);
    }


    public function updateInfo(Request $request)
    {
        $request->validate([
            "email"=>"required|email",
            "name"=>"required"
        ]);

        $locale = $request->input('lang');

        $searchedUser = User::where('email', $request->email)->first();

        if($searchedUser){

            if($searchedUser->id != $request->id) {
                throw ValidationException::withMessages([
                    'email' =>["This email is already exist"],
                ]);
                // return response()->json(["error" => "This email is already exist"],403);

            }else{
                // if (in_array($locale, ['en', 'fr'])) {

                //     session()->put('locale', $locale);

                //     App::setLocale(session()->get('locale'));
                // }
                return $this->repository->updateInfo($request);
            }
        }else{
                // if (in_array($locale, ['en', 'fr'])) {

                //      App::setLocale(session()->get('locale'));

                //     session()->put('locale', $locale);
                // }

            return $this->repository->updateInfo($request);

        }
    }



}
