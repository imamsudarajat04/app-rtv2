<?php

namespace App\Services;

use App\Data_warga;
use App\Notifications\DataWargaVerificationNotification;
use Illuminate\Support\Facades\Log;

class WhatsAppNotificationService
{
    /**
     * Send verification notification to warga
     *
     * @param Data_warga $dataWarga
     * @param string $verificationType
     * @return array
     */
    public function sendVerificationNotification(Data_warga $dataWarga, $verificationType = 'verification')
    {
        try {
            // Check if phone number exists
            if (empty($dataWarga->no_telp)) {
                return [
                    'success' => false,
                    'error' => 'Nomor telepon tidak tersedia'
                ];
            }

            // Check Twilio configuration
            if (empty(config('services.twilio.sid')) || empty(config('services.twilio.token'))) {
                return [
                    'success' => false,
                    'error' => 'Konfigurasi Twilio tidak lengkap. Silakan periksa file .env'
                ];
            }

            // Create a mock notifiable object for the warga
            $notifiable = new class($dataWarga) {
                public $no_telp;
                
                public function __construct($dataWarga)
                {
                    $this->no_telp = $dataWarga->no_telp;
                }
                
                public function routeNotificationFor($driver)
                {
                    return $this->no_telp;
                }
            };

            // Send notification
            $notification = new DataWargaVerificationNotification($dataWarga, $verificationType);
            $result = app('App\Broadcasting\WhatsAppChannel')->send($notifiable, $notification);

            if ($result['success']) {
                Log::info('WhatsApp notification sent successfully', [
                    'warga_id' => $dataWarga->id,
                    'phone' => $dataWarga->no_telp,
                    'type' => $verificationType,
                    'message_id' => $result['message_id'] ?? null
                ]);
            } else {
                Log::error('WhatsApp notification failed', [
                    'warga_id' => $dataWarga->id,
                    'phone' => $dataWarga->no_telp,
                    'type' => $verificationType,
                    'error' => $result['error'] ?? 'Unknown error'
                ]);
            }

            return $result;

        } catch (\Exception $e) {
            Log::error('Error sending WhatsApp notification: ' . $e->getMessage(), [
                'warga_id' => $dataWarga->id,
                'phone' => $dataWarga->no_telp,
                'type' => $verificationType,
                'exception' => $e->getMessage()
            ]);

            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Send bulk verification notifications
     *
     * @param array $wargaIds
     * @param string $verificationType
     * @return array
     */
    public function sendBulkVerificationNotifications($wargaIds, $verificationType = 'verification')
    {
        $results = [];
        $successCount = 0;
        $failureCount = 0;

        foreach ($wargaIds as $wargaId) {
            $dataWarga = Data_warga::find($wargaId);
            
            if ($dataWarga) {
                $result = $this->sendVerificationNotification($dataWarga, $verificationType);
                
                if ($result['success']) {
                    $successCount++;
                } else {
                    $failureCount++;
                }
                
                $results[] = [
                    'warga_id' => $wargaId,
                    'result' => $result
                ];
            }
        }

        return [
            'total' => count($wargaIds),
            'success' => $successCount,
            'failure' => $failureCount,
            'results' => $results
        ];
    }

    /**
     * Send verification status update notification
     *
     * @param Data_warga $dataWarga
     * @param string $newStatus
     * @return array
     */
    public function sendStatusUpdateNotification(Data_warga $dataWarga, $newStatus)
    {
        $verificationType = $this->mapStatusToVerificationType($newStatus);
        return $this->sendVerificationNotification($dataWarga, $verificationType);
    }

    /**
     * Map status to verification type
     *
     * @param string $status
     * @return string
     */
    protected function mapStatusToVerificationType($status)
    {
        switch (strtolower($status)) {
            case 'verified':
            case 'terverifikasi':
            case '1':
                return 'verification';
                
            case 'rejected':
            case 'ditolak':
            case '0':
                return 'rejection';
                
            case 'pending':
            case 'menunggu':
            case '2':
                return 'pending';
                
            default:
                return 'verification';
        }
    }

    /**
     * Get verification notes for warga
     *
     * @param Data_warga $dataWarga
     * @return string|null
     */
    public function getVerificationNotes(Data_warga $dataWarga)
    {
        return $dataWarga->verification_notes;
    }
}
