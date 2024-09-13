<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Services\GuestService;
use App\Http\Requests\CreateGuestRequest;
use App\Helpers\PhoneNumberCountryDetector;

class GuestController extends Controller
{
    public function show(int $id, GuestService $guestService)
    {
        $guest = $guestService->getGuestById($id);
        if (!$guest) {
            return response()->json(['message' => 'Guest not found'], 404);
        }

        return response()->json($guest);
    }

    public function create(CreateGuestRequest $request)
    {
        $guest = Guest::create($request->validated());

        if ($country = $request->validated()['country'] ?? PhoneNumberCountryDetector::handle($request->validated()['phone'])) {
            $countryModel = Country::firstOrCreate(['name' => $country]);
            $guest->country()->associate($countryModel);
            $guest->save();
        }

        return response()->json($guest);
    }

    public function update(Request $request, int $id, GuestService $guestService)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^\+[0-9]+$/|between:10,15',
            'email' => 'nullable|string|email|max:255',
            'country' => 'nullable|string|max:255',
        ]);

        $guest = $guestService->getGuestById($id);
        if (!$guest) {
            return response()->json(['message' => 'Guest not found'], 404);
        }

        $guest->update($validated);

        if ($country = $validated['country'] ?? PhoneNumberCountryDetector::handle($validated['phone'])) {
            $countryModel = Country::firstOrCreate(['name' => $country]);
            $guest->country()->associate($countryModel);
            $guest->save();
        }

        return response()->json($guest);
    }

    public function delete(int $id, GuestService $guestService)
    {
        $guest = $guestService->getGuestById($id);
        if (!$guest) {
            return response()->json(['message' => 'Guest not found'], 404);
        }

        $guest->delete();

        return response()->json();
    }
}
