<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function getFormattedCreatedAtAttribute(): ?string
    {
        return $this->format_date($this->created_at);
    }

    public function getFormattedUpdatedAtAttribute(): ?string
    {
        return $this->format_date($this->created_at);
    }

    protected function format_price($price): ?string
    {
        return $price ? number_format($price, 2, ',', ' ') : null;
    }

    protected function format_date($date): ?string
    {
        return $date ? Carbon::parse($date)->format('d. m. Y') : null;
    }

    protected function format_date_time($date): ?string
    {
        return $date ? Carbon::parse($date)->format('d. m. Y H:i:s') : null;
    }
}
