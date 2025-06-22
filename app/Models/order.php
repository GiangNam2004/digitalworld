<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;

class order extends Model
{
    use HasFactory, Notifiable;

    public function routeNotificationForMail()
    {
        // Return email address only...
        return 'dinhvane168@gmail.com';
    }
    protected $fillable = [
        'name', 'phone', 'email', 'city', 'district', 'ward', 'address', 
        'note', 'order_detail', 'token', 'status'  // Thêm status ở đây
    ];
}
