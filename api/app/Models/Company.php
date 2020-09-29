<?php

namespace App\Models;

use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;
    protected $appends = ['favorited'];

    /**
     * Determine whether a company has been marked as favorite by a user.
     *
     * @return boolean
     */
    public function getFavoritedAttribute()
    {
        return (bool) Favorite::where('user_id', Auth::id())
                            ->where('company_id', $this->id)
                            ->first();
    }
}
