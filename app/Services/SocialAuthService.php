<?php declare(strict_types=1);


namespace App\Services;
use App\Contracts\Social;
use \App\Http\Controllers;
use \App\Models\User as UserModel;
use Exception;
use Laravel\Socialite\Contracts\User;

class SocialAuthService implements Social
{
    protected array $user;

    public function userInit(User $user, $driver):bool
    {
        $userM = UserModel::where(['email'  => $user->getEmail()])->first();

        if ($userM) {
            $userM->name =$user->getName();
            $userM->avatar = $user->getAvatar();
            $userM->email = $user->getEmail();

            if ($userM->save()) {
                \Auth::loginUsingId($userM->id);
                return true;
            } else {
                return false;
            }

        } else {
            $userM = new UserModel();
            $userM->name =$user->getName();
            $userM->avatar = $user->getAvatar();
            $userM->email = $user->getEmail();
            $userM->auth_via = $driver;
            if ($userM->save()) {
                return true;
            }  else {
                return false;
            }
        }
    }

}
