<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RequestATCCode extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->subject('Nestleunion Bank')->from('noreply@nestleunion.com')
            ->line($this->data['trans']->user->first_name ." ".$this->data['trans']->user->last_name ." Requested for ATC Code")
            ->line("Transaction Summary")
            ->line('Amount: ' . $this->data['trans']->amount)
            ->line('Acct No: ' . $this->data['trans']->from)
            ->line('Date: ' . $this->data['trans']->created_at)
            ->action('View Details', route('admin.withdrawal_details'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
