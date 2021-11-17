<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class recoveryPasswordMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Brochure-Recovery-Password-Request';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $user = DB::table('users')->where('id', '=', $request->id)->first();

        $decryptedPassword = decrypt($user->password);
        echo $decryptedPassword;
        // try {
        //     $decrypted = Crypt::decryptString($user->password);
        //     echo $decrypted;
        //     die;
        // } catch (DecryptException $e) {
        //     var_dump($e->getMessage());
        //     die;
        // }
        
        // return $this->view('mail.recovery-password-mailable', [
        //     "title" => "Recovering Password" . $user->name,
        //     "name" => $user->name,
        //     "username" => $user->username,
        //     "password" => $user->password,
        //     "hostname" => 'http://192.168.100.5:8000/',
        // ]);
    }
}
