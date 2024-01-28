<?php

namespace App\Http\Controllers;

use App\Events\ContactRequestEvent;
use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertiesRequest;
use App\Mail\PropertyContactMail;
use App\Models\Property;
use App\Models\User;
use App\Notifications\ContactRequestNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class PropertyController extends Controller
{
    public function index(SearchPropertiesRequest $request)
    {
        $query = Property::query()->available()->recent();

        if ($price = $request->validated('price')) {
            $query->where('price', '<=', $price);
        }

        if ($surface = $request->validated('surface')) {
            $query->where('surface', '>=', $surface);
        }

        if ($rooms = $request->validated('rooms')) {
            $query->where('rooms', '>=', $rooms);
        }

        if ($title = $request->validated('title')) {
            $query->where('title', 'like', '%' . $title . '%');
        }

        return view('properties.index', [
            'properties' => $query->paginate(16),
            'input' => $request->validated(),
        ]);
    }

    public function show(string $slug, Property $property)
    {
        $expectedSlug = $property->getSlug();

        if ($slug !== $expectedSlug) {
            return to_route('property.show', [
                'slug' => $expectedSlug,
                'property' => $property,
            ]);
        }

        return view('properties.show', [
            'property' => $property,
        ]);
    }

    public function contact(Property $property, PropertyContactRequest $request)
    {
        Notification::route('mail', 'john@admin.fr')->notify(new ContactRequestNotification($property, $request->validated()));

        return back()->with('success', 'Votre demande de contact a bien été envoyée.');
    }
}
