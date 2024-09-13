<?php

namespace App\Services;

use App\Models\Guest;

class GuestService
{
    public function getGuestById(int $id)
    {
        return Guest::find($id);
    }
}