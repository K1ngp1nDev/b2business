<?php

namespace App\Models\Chat;

use App\Models\Chat\Traits\Relations\ChatRelations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use ChatRelations, SoftDeletes;

    protected $fillable = [
        'offer_id', 'seller_id', 'customer_id'
    ];

    public function lastMessage()
    {
        return $this->messages()->orderByDesc('created_at')->first();
    }

    public function unreadMessages()
    {
        $user = auth()->user();

        return $this->messages()
            ->where([
                ['chat_id', $this->id],
                ['is_read', false]])
            ->whereHas('user', function ($query) use ($user) {
                $query->where('company_id', '!=', $user->company_id);
            })->get();
    }
}
