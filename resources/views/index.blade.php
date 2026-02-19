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
                <h2 class="text-gray-200">Tech stack</h2>
                <p class="text-gray-500 mt-6">I build robust applications using Laravel and Vue, focusing on
                    performance, maintainability, and clean architecture.
                </p>
            </div>
            <div class="p-10">
                <h2 class="text-gray-200">AI utilization</h2>
                <p class="text-gray-500 mt-6">I leverage modern AI tools to accelerate development, automate workflows, and deliver smarter, more efficient solutions.
                </p>
            </div>
            <div class="p-10 bg-gray-900 relative z-10 col-span-2 border-t-1 border-white/5">
                <h2 class="text-gray-200">Design</h2>
                <p class="text-gray-500 mt-6">I design clean, intuitive interfaces and ensure that usability and visual clarity support the product’s purpose.
                </p>
            </div>
        </div>
    </div>
</section>

</body>
</html>
