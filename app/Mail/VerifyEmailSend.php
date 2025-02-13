<?php

namespace App\Mail;

use App\Models\User;
use http\Url;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmailSend extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email\verificationEmailSend')->with(
            [
                'name' => $this->user->persian_family_name ,
                'link' => $this->generateUrl()
            ]
        );
    }

    protected function generateUrl(){

        return \Illuminate\Support\Facades\URL::temporarySignedRoute('user.email.verify' , now()->addMinutes(15) ,[
            'email' =>$this->user->email
        ] );
    }
}
