<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900">

<section class="bg-gradient-up">
    <div class="container">
        <div class="lg:py-40 py-24 border-x-1 border-white/5 relative">
            <div class="absolute md:block hidden left-1/4 top-0 h-full w-px bg-white/5"></div>
            <div class="absolute left-2/4 top-0 h-full w-px bg-white/5"></div>
            <div class="absolute md:block hidden left-3/4 top-0 h-full w-px bg-white/5"></div>
            <div class="lg:w-3/5 px-2">
                <h1 class="text-5xl text-white">I <span
                        class="bg-linear-120 from-blue-400 to-blue-600 text-clip bg-clip-text text-transparent italic">build</span>
                    & <span
                        class="bg-linear-120 from-blue-400 to-blue-600 text-clip bg-clip-text text-transparent italic">design</span>
                    awesome things for the web.</h1>

                <p class="text-gray-500 mt-5 w-4/5">Hi, I’m Jelle — a developer from the Netherlands focused on building fast, modern, and user-friendly web experiences.</p>


                <a href="" class="mt-3 btn btn-p">contact</a>
                <a href="" class="mt-3 btn btn-s">lets connect</a>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="grid lg:grid-cols-2  border-1 border-white/5 relative">
            <div class="absolute left-1/2 top-0 h-full w-px bg-white/5"></div>
            <div class="p-10">
                <svg class="size-16 fill-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M288 64L288 144L352 144L352 64L448 64L448 272L192 272L192 64L288 64zM576 576L368 576L368 320L416 320L416 400L480 400L480 320L576 320L576 576zM320 320L320 576L64 576L64 320L160 320L160 400L224 400L224 320L320 320z"/></svg>
                <h2 class="text-gray-200">Tech stack</h2>
                <p class="text-gray-500 mt-6">I build robust applications using Laravel and Vue, focusing on
                    performance, maintainability, and clean architecture.
                </p>
            </div>
            <div class="p-10">
                <svg class="size-16 fill-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M240 88L240 64L192 64L192 128L128 128L128 192L64 192L64 240L128 240L128 296L64 296L64 344L128 344L128 400L64 400L64 448L128 448L128 512L192 512L192 576L240 576L240 512L296 512L296 576L344 576L344 512L400 512L400 576L448 576L448 512L512 512L512 448L576 448L576 400L512 400L512 344L576 344L576 296L512 296L512 240L576 240L576 192L512 192L512 128L448 128L448 64L400 64L400 128L344 128L344 64L296 64L296 128L240 128L240 88zM380 240L420 240L420 400L380 400L380 240zM264.8 240L295.3 240L298.7 248.8L357.3 400L314.4 400L306.6 380L253.4 380L245.6 400L202.7 400L261.3 248.8L264.7 240zM280 311.4L268.9 340L291.1 340L280 311.4z"/></svg>
                <h2 class="text-gray-200">AI utilization</h2>
                <p class="text-gray-500 mt-6">I leverage modern AI tools to accelerate development, automate workflows, and deliver smarter, more efficient solutions.
                </p>
            </div>
            <div class="p-10 bg-gray-900 relative z-10 col-span-2 border-t-1 border-white/5">
                <svg class="size-16 fill-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M320 128L288 64L256 64L224 128L192 64L128 64L128 320L512 320L512 64L352 64L320 128zM128 368L128 448L256 448L256 576L384 576L384 448L512 448L512 368L128 368zM320 528C311.2 528 304 520.8 304 512C304 503.2 311.2 496 320 496C328.8 496 336 503.2 336 512C336 520.8 328.8 528 320 528z"/></svg>
                <h2 class="text-gray-200">Design</h2>
                <p class="text-gray-500 mt-6">I design clean, intuitive interfaces and ensure that usability and visual clarity support the product’s purpose.
                </p>
            </div>
        </div>
    </div>
</section>

</body>
</html>
