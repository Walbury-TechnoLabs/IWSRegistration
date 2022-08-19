<?php

if (!function_exists('mail_to')) {
    function mail_to() { 
        $view = $mailbox['layout'] ? $mailbox['layout'] : 'generic';
        try {
           dispatch(function () use ($view, $mailbox) {
                Mail::send('email.' . $view, $mailbox['mail_body'], function ($message) use ($mailbox) {
                    $message->subject($mailbox['subject']);
                    $message->to(explode(',', $mailbox['mail_to'])); 
                });
           })->delay(now()); 
           if ($mailbox) {
              return $mailbox['response'] = 'success';
           }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 412);
        }
    
    } 
}
