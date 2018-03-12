<?php

namespace Alumni\Mail;

use Alumni\Company;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CompanyPassword extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $company;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Company $company, $password)
    {
        $this->company = $company;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('rednianred@gmail.com')
            ->subject('Vita Password')
            ->view('layouts.admin.email');
    }
}
