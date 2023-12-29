<?php

namespace App\Observers;

use App\Models\ExitPass;
use App\Models\User;
use App\Notifications\TelegramNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Notification;

class ExitPassObserver
{
    public function convertTime($time)
    {
        $convertedTime = Carbon::createFromFormat('H:i', $time)->format('h:i A');

        return $convertedTime;
    }

    /**
     * Handle the ExitPass "created" event.
     */
    public function created(ExitPass $exitPass): void
    {
        $convertedTime = $this->convertTime($exitPass->time);
        $department_id = $exitPass?->user?->department_id;
        $users = User::where('department_id', $department_id)->get();
        foreach ($users as $index => $user) {
            if ($user->roles->contains('id', 2) && $user->telegram_chat_id) {
                $user->pass_id = $exitPass->id;
                $user->chat_id = $user->telegram_chat_id;
                $user->pass_time = $convertedTime;
                $user->pass_reason = $exitPass->reason_type;

                try {
                    $user->notify(new TelegramNotification);
                } catch (Exception $e) {
                    continue;
                }
            }
        }

        //whatsapp_notifications
        // $url = 'https://graph.facebook.com/v17.0/115339551609935/messages';
        // $accessToken = env('WHATSAPP_TOKEN');

        // $data = [
        //     'messaging_product' => 'whatsapp',
        //     'to' => '94762313562',
        //     'type' => 'template',
        //     'template' => [
        //         'name' => 'hello_world',
        //         'language' => [
        //             'code' => 'en_US'
        //         ]
        //     ]
        // ];

        // $headers = [
        //     'Authorization: Bearer ' . $accessToken,
        //     'Content-Type: application/json'
        // ];

        // $curl = curl_init($url);
        // curl_setopt($curl, CURLOPT_POST, true);
        // curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        // curl_exec($curl);
        // curl_close($curl);
    }

    /**
     * Handle the ExitPass "updated" event.
     */
    public function updated(ExitPass $exitPass): void
    {
        //
    }

    /**
     * Handle the ExitPass "deleted" event.
     */
    public function deleted(ExitPass $exitPass): void
    {
        //
    }

    /**
     * Handle the ExitPass "restored" event.
     */
    public function restored(ExitPass $exitPass): void
    {
        //
    }

    /**
     * Handle the ExitPass "force deleted" event.
     */
    public function forceDeleted(ExitPass $exitPass): void
    {
        //
    }
}
