<?php

use Illuminate\Support\Facades\Mail;

if (!function_exists('sendMail')) {
    function sendMail($mailbox) { 
        $view = $mailbox['layout'] ? $mailbox['layout'] : 'generic';
        try {
        //    dispatch(function () use ($view, $mailbox) {
                return Mail::send('email.' . $view, $mailbox['mail_body'], function ($message) use ($mailbox) {
                    $message->subject($mailbox['subject']);
                    $message->to(explode(',', $mailbox['mail_to']));
                    $message->attach(public_path(). "/IWSRegistration.pdf",  [
                        'as' => 'IWSRegistration.pdf',
                        'mime' => 'application/pdf',
                    ]); 
                });
        //    })->delay(now()); 
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 412);
        }
    } 
}