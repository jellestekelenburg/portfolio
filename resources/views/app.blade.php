<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
<head>
    @php
        $siteName = config('app.name', 'Jelle Stekelenburg');
        $description = 'Jelle Stekelenburg is a developer from the Netherlands focused on building fast, modern, and user-friendly web experiences.';
        $url = url('/');
        $image = asset('img/og.webp');
    @endphp

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet"
    >
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="/favicon/favicon.ico">
    <link rel="icon" type="image/svg" href="/favicon/favicon.svg">

    @vite(['resources/js/app.ts'])

    <x-inertia::head>
        <title>{{ $siteName }}</title>
        <meta data-inertia="description" name="description" content="{{ $description }}">
        <meta data-inertia="robots" name="robots" content="index, follow">
        <link data-inertia="canonical" rel="canonical" href="{{ $url }}">
        <meta data-inertia="og:type" property="og:type" content="website">
        <meta data-inertia="og:title" property="og:title" content="{{ $siteName }}">
        <meta data-inertia="og:description" property="og:description" content="{{ $description }}">
        <meta data-inertia="og:url" property="og:url" content="{{ $url }}">
        <meta data-inertia="og:site_name" property="og:site_name" content="{{ $siteName }}">
        <meta data-inertia="og:locale" property="og:locale" content="en_US">
        <meta data-inertia="og:image" property="og:image" content="{{ $image }}">
        <meta data-inertia="og:image:type" property="og:image:type" content="image/webp">
        <meta data-inertia="og:image:width" property="og:image:width" content="1000">
        <meta data-inertia="og:image:height" property="og:image:height" content="743">
        <meta data-inertia="og:image:alt" property="og:image:alt" content="{{ $siteName }}">
        <meta data-inertia="twitter:card" name="twitter:card" content="summary_large_image">
        <meta data-inertia="twitter:title" name="twitter:title" content="{{ $siteName }}">
        <meta data-inertia="twitter:description" name="twitter:description" content="{{ $description }}">
        <meta data-inertia="twitter:image" name="twitter:image" content="{{ $image }}">
        <meta data-inertia="twitter:image:alt" name="twitter:image:alt" content="{{ $siteName }}">
    </x-inertia::head>
</head>
<body class="antialiased bg-white dark:bg-gray-900">
<x-inertia::app />
</body>
</html>
