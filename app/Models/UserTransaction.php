<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserTransaction extends Model
{
    use HasFactory;

    // Assign database table
    protected $table = 'user_transactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'amount',
        'first_app_id'
    ];

    /**
     * user
     * 
     * user_id in the user_transactions table
     * represents the users ID
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}