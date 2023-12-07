<?php

namespace App\Models;

use App\Events\ParticipantEntered;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class Participant extends Model
{
    use HasFactory, Notifiable;

    protected static function booted(): void
    {
        static::created(function (Participant $participant) {
            //broadcast our notification
            broadcast(new ParticipantEntered($participant));
        });
    }
    protected $fillable = ['name','email_address','phone_number'];

    public function routeNotificationForVonage(Notification $notification): string
    {
        if(strlen($this->phone_number) && substr($this->phone_number,0,1) == 0)
        {
            $ret = '+44' . substr($this->phone_number,1);
        }
        else{
            $ret = $this->phone_number;
        }
        return $ret;
    }

    public function routeNotificationForMail(Notification $notification): array|string
    {
        // Return email address and name...
        return [$this->email_address => $this->name];
    }
}
