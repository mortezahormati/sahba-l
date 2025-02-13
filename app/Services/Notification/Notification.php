<?php
namespace App\Services\Notification;

use App\Models\User;
use Illuminate\Mail\Mailable;
use PharIo\Manifest\Email;

/**
 * Class Notification
 * @package App\Services\Notification
 * @method sendSms(User $user , String $text)
 * @method sendEmail(User $user , Mailable $mailable)
 * @method sendCustom(User $user , String $text)
 */



class Notification
{


    public function __call($method,$arguments)
    {
        $providerPath =__NAMESPACE__.'\Providers\\'. substr($method,4).'Provider';
        if(!class_exists($providerPath)){
            throw new \Exception("Class does not exist!!!");
        }
        $providerInstance = new $providerPath(...$arguments);
        if(!is_subclass_of($providerInstance,Providers\Contracts\Provider::class)){
            throw new \Exception("class must impiliments Provider");
        }
        return $providerInstance->send();
    }

}

