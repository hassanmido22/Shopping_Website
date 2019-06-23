<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $messageee;
public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data , $messageee)
    {
        $this->data=$data;
        $this->messageee=$messageee;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //dd($this->message);
        return $this->subject('New Order')->view('dynamic_email_template')->with(['data'=>$this->data,
                                'messageee'=> $this->messageee]);;
    }
}
//->with('data',$this->data)
