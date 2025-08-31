<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Data_warga;

class DataWargaVerificationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $dataWarga;
    protected $verificationType;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Data_warga $dataWarga, $verificationType = 'verification')
    {
        $this->dataWarga = $dataWarga;
        $this->verificationType = $verificationType;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['whatsapp'];
    }

    /**
     * Get the WhatsApp representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toWhatsApp($notifiable)
    {
        $message = $this->buildMessage();
        
        return [
            'body' => $message
        ];
    }

    /**
     * Build the WhatsApp message based on verification type
     *
     * @return string
     */
    protected function buildMessage()
    {
        $nama = $this->dataWarga->nama_lengkap;
        $nik = $this->dataWarga->nik;
        $noKK = $this->dataWarga->no_kk;
        
        switch ($this->verificationType) {
            case 'verification':
                return "🔔 *NOTIFIKASI VERIFIKASI DATA WARGA*\n\n" .
                       "Halo {$nama},\n\n" .
                       "Data warga Anda telah berhasil diverifikasi oleh admin.\n\n" .
                       "📋 *Detail Data:*\n" .
                       "• Nama: {$nama}\n" .
                       "• NIK: {$nik}\n" .
                       "• No. KK: {$noKK}\n\n" .
                       "✅ Status: *TERVERIFIKASI*\n\n" .
                       "Terima kasih telah mendaftar sebagai warga.\n\n" .
                       "Salam,\nTim Admin";
                       
            case 'rejection':
                $notes = $this->dataWarga->verification_notes;
                $notesSection = !empty($notes) ? "\n📝 *Catatan:*\n{$notes}\n" : "\n";
                
                return "⚠️ *NOTIFIKASI PENOLAKAN DATA WARGA*\n\n" .
                       "Halo {$nama},\n\n" .
                       "Mohon maaf, data warga Anda belum dapat diverifikasi.\n\n" .
                       "📋 *Detail Data:*\n" .
                       "• Nama: {$nama}\n" .
                       "• NIK: {$nik}\n" .
                       "• No. KK: {$noKK}\n\n" .
                       "❌ Status: *DITOLAK*" .
                       $notesSection .
                       "Silakan periksa kembali kelengkapan data dan ajukan ulang.\n\n" .
                       "Salam,\nTim Admin";
                       
            case 'pending':
                return "⏳ *NOTIFIKASI STATUS PENDING*\n\n" .
                       "Halo {$nama},\n\n" .
                       "Data warga Anda sedang dalam proses verifikasi.\n\n" .
                       "📋 *Detail Data:*\n" .
                       "• Nama: {$nama}\n" .
                       "• NIK: {$nik}\n" .
                       "• No. KK: {$noKK}\n\n" .
                       "⏳ Status: *SEDANG DIPROSES*\n\n" .
                       "Tim admin akan segera memverifikasi data Anda.\n\n" .
                       "Salam,\nTim Admin";
                       
            default:
                return "🔔 *NOTIFIKASI DATA WARGA*\n\n" .
                       "Halo {$nama},\n\n" .
                       "Ada pembaruan status untuk data warga Anda.\n\n" .
                       "📋 *Detail Data:*\n" .
                       "• Nama: {$nama}\n" .
                       "• NIK: {$nik}\n" .
                       "• No. KK: {$noKK}\n\n" .
                       "Silakan cek status terbaru di sistem.\n\n" .
                       "Salam,\nTim Admin";
        }
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
            'data_warga_id' => $this->dataWarga->id,
            'verification_type' => $this->verificationType,
            'message' => $this->buildMessage()
        ];
    }
}
