<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\WhatsAppNotificationService;
use App\Data_warga;

class TestWhatsAppNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'whatsapp:test {--warga-id=1} {--type=verification}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test WhatsApp notification for warga verification';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $wargaId = $this->option('warga-id');
        $type = $this->option('type');

        $this->info("Testing WhatsApp notification for warga ID: {$wargaId}");
        $this->info("Notification type: {$type}");

        try {
            $dataWarga = Data_warga::find($wargaId);
            
            if (!$dataWarga) {
                $this->error("Data warga dengan ID {$wargaId} tidak ditemukan!");
                return 1;
            }

            $this->info("Data warga ditemukan:");
            $this->table(
                ['Field', 'Value'],
                [
                    ['ID', $dataWarga->id],
                    ['Nama', $dataWarga->nama_lengkap],
                    ['NIK', $dataWarga->nik],
                    ['No. KK', $dataWarga->no_kk],
                    ['No. Telp', $dataWarga->no_telp ?: 'Tidak ada'],
                    ['Status Verifikasi', $this->getVerificationStatus($dataWarga->verification)]
                ]
            );

            if (empty($dataWarga->no_telp)) {
                $this->warn("Peringatan: Nomor telepon tidak tersedia untuk warga ini!");
                $this->warn("Notifikasi WhatsApp tidak dapat dikirim.");
                return 1;
            }

            $this->info("Mengirim notifikasi WhatsApp...");
            
            $whatsappService = app(WhatsAppNotificationService::class);
            $result = $whatsappService->sendVerificationNotification($dataWarga, $type);

            if ($result['success']) {
                $this->info("✅ Notifikasi WhatsApp berhasil dikirim!");
                $this->table(
                    ['Field', 'Value'],
                    [
                        ['Status', 'Success'],
                        ['Message ID', $result['message_id'] ?? 'N/A'],
                        ['Twilio Status', $result['status'] ?? 'N/A']
                    ]
                );
            } else {
                $this->error("❌ Gagal mengirim notifikasi WhatsApp!");
                $this->error("Error: " . ($result['error'] ?? 'Unknown error'));
                return 1;
            }

        } catch (\Exception $e) {
            $this->error("❌ Terjadi kesalahan: " . $e->getMessage());
            $this->error("Stack trace: " . $e->getTraceAsString());
            return 1;
        }

        return 0;
    }

    /**
     * Get verification status text
     */
    protected function getVerificationStatus($status)
    {
        switch ($status) {
            case 0:
                return 'Ditolak';
            case 1:
                return 'Terverifikasi';
            case 2:
                return 'Menunggu';
            default:
                return 'Tidak Diketahui';
        }
    }
}
