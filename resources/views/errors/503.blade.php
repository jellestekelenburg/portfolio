<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coming Soon</title>
    <style>
        :root {
            color-scheme: dark;
            --bg: #151515;
            --panel: rgba(255, 255, 255, 0.05);
            --border: rgba(255, 255, 255, 0.1);
            --text: #f5f5f5;
            --muted: #b3b3b3;
            --accent: #c6ff33;
            --accent-dark: #72b01d;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 2rem;
            font-family: "DM Sans", system-ui, sans-serif;
            background:
                radial-gradient(circle at top, rgba(198, 255, 51, 0.22), transparent 42%),
                linear-gradient(180deg, transparent 0%, rgba(114, 176, 29, 0.08) 100%),
                var(--bg);
            color: var(--text);
        }

        main {
            width: min(100%, 72rem);
            border: 1px solid var(--border);
            background: var(--panel);
            backdrop-filter: blur(14px);
            padding: 3rem;
        }

        .eyebrow {
            margin: 0;
            color: var(--accent);
            letter-spacing: 0.3em;
            text-transform: uppercase;
            font-size: 0.8rem;
        }

        h1 {
            margin: 1.5rem 0 0;
            max-width: 12ch;
            font-family: "Playfair Display", Georgia, serif;
            font-size: clamp(3rem, 8vw, 5.5rem);
            line-height: 0.95;
        }

        p {
            margin: 1.5rem 0 0;
            max-width: 42rem;
            color: var(--muted);
            font-size: 1.05rem;
            line-height: 1.9;
        }

        .badges {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            margin-top: 2rem;
        }

        .badge {
            border: 1px solid var(--border);
            padding: 0.8rem 1rem;
            color: var(--muted);
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
<main>
    <p class="eyebrow">503 Service Unavailable</p>
    <h1>Something new is on the way.</h1>
    <p>
        This site is temporarily unavailable while the new version is being prepared.
        Please check back soon.
    </p>

    <div class="badges">
        <div class="badge">Portfolio relaunch</div>
        <div class="badge">Under construction</div>
    </div>
</main>
</body>
</html>
