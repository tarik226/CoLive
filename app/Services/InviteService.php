<?php
namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Mail\JoinColloc;

class InviteService
{
    public function sendInvites(array $emails,$id_coloc,$token)
    {
        // Filter out empty or null values
        $emails = array_filter($emails, function($email) {
            return !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
        });
        foreach ($emails as $email) {
            Mail::to($email)->send(new JoinColloc($token,$id_coloc));
        }
    }
}
