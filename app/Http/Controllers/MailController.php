<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function testMail(){
        $mailbox = [
            'layout' => 'welcome-user',
            'mail_body' => [],
            'subject' => 'dscvsdbvgsdbs',
            'mail_to' => 'rupeshsejgaya5@gmail.com',
        ];
        sendMail($mailbox);
        return 'test mail sent successfully'; 
    } 
}
