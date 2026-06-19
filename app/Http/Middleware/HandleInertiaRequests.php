<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $siteName = config('app.name', 'Jelle Stekelenburg');
        $description = 'Jelle Stekelenburg is a developer from the Netherlands focused on building fast, modern, and user-friendly web experiences.';

        return [
            ...parent::share($request),
            'name' => $siteName,
            'auth' => [
                'user' => $request->user(),
            ],
            'seo' => [
                'siteName' => $siteName,
                'description' => $description,
                'url' => $request->url(),
                'image' => asset('apple-touch-icon.png'),
                'imageAlt' => $siteName,
                'locale' => 'en_US',
                'twitterCard' => 'summary',
            ],
            'sidebarOpen' => ! $request->hasCookie('sidebar_state') || $request->cookie('sidebar_state') === 'true',
        ];
    }
}
