<?php

namespace App\Broadcasting;

use Illuminate\Notifications\Notification;
use Twilio\Rest\Client;
use App\User;

class WhatsAppChannel
{
    protected $twilio;

    public function __construct()
    {
        $accountSid = config('services.twilio.sid');
        $authToken = config('services.twilio.token');
        
        if (empty($accountSid) || empty($authToken)) {
            throw new \Exception('Twilio credentials not configured. Please check your .env file.');
        }
        
        $this->twilio = new Client($accountSid, $authToken);
    }

    public function send($notifiable, Notification $notification): array
    {
        $message = $notification->toWhatsApp($notifiable);
        $to = formatToE164($notifiable->no_telp);
    
        try {
            $result = $this->twilio->messages->create(
                'whatsapp:' . $to,
                [
                    'from' => 'whatsapp:' . config('services.twilio.from'),
                    'body' => $message['body']
                ]
            );
            
            return [
                'success' => true,
                'message_id' => $result->sid,
                'status' => $result->status
            ];
        } catch (\Exception $e) {
            \Log::error('WhatsApp notification failed: ' . $e->getMessage());
            
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
}
