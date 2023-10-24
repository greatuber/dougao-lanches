<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification
{
    // use Queueable;
    protected $audioUrl;
    /**
     * Create a new notification instance.
     */
    public function __construct($audioUrl)
        {
            $this->audioUrl = $audioUrl;
        }


    public function toBrowser($notifiable)
       {
        
        return (new BroadcastMessage())
        ->data(['audio_url' => $this->audioUrl]);

       }

  
}
