<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('output.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <title>LinguaSphere - Learning Path</title>
        <meta name="description" content="Obito is an innovative online learning platform that empowers students and professionals with high-quality, accessible courses.">

        <!-- Favicon -->
        <link rel="icon" type="image/png" sizes="32x32" href="assets/images/logos/logo-64.png">
        <link rel="apple-touch-icon" href="assets/images/logos/logo-64.png">

        <!-- Open Graph Meta Tags -->
        <meta property="og:title" content="Obito Online Learning Platform - Learn Anytime, Anywhere">
        <meta property="og:description" content="Obito is an innovative online learning platform that empowers students and professionals with high-quality, accessible courses.">
        <meta property="og:image" content="https://obito-platform.netlify.app/assets/images/logos/logo-64-big.png">
        <meta property="og:url" content="https://obito-platform.netlify.app">
        <meta property="og:type" content="website">
</head>
<body>
    <nav id="nav-guest" class="flex w-full bg-white border-b border-obito-grey">
        <div class="flex w-[1280px] px-[75px] py-5 items-center justify-between mx-auto">
            <div class="flex items-center gap-[50px]">
                <a href="index.html" class="flex shrink-0">
                    <img src="{{ asset("assets/images/icons/linguasphere.png")}}" width="100" alt="logo">
                </a>
                <ul class="flex items-center gap-10">
                    <li class="hover:font-semibold transition-all duration-300">
                        <a href="#">Beranda</a>
                    </li>
                    <li class="hover:font-semibold transition-all duration-300">
                        <a href="pricing.html">Kelas</a>
                    </li>
                    <li class="font-bold hover:font-semibold transition-all duration-300">
                        <a href="#">Panduan Belajar</a>
                    </li>
                    <li class="hover:font-semibold transition-all duration-300">
                        <a href="#">Testimoni</a>
                    </li>
                </ul>
            </div>
            <div class="flex items-center gap-5 justify-end">
                <a href="#" class="flex shrink-0">
                    <img src="assets/images/icons/device-message.svg" class="flex shrink-0" alt="icon">
                </a>
                <div class="h-[50px] flex shrink-0 bg-obito-grey w-px"></div>
                <div class="flex items-center gap-3">
                    <a href="signup.html" class="rounded-full border border-obito-grey py-3 px-5 gap-[10px] bg-white hover:border-obito-green transition-all duration-300">
                        <span class="font-semibold">Sign Up</span>
                    </a>
                    <a href="signin.html" class="rounded-full py-3 px-5 gap-[10px] bg-obito-green hover:drop-shadow-effect transition-all duration-300">
                        <span class="font-semibold text-white">My Account</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <nav id="bottom-nav" class="flex w-full bg-white border-b border-obito-grey py-[14px]">
        <ul class="flex w-full max-w-[1280px] px-[75px] mx-auto gap-3">
            <li class="group active">
                <a href="#" class="flex items-center gap-2 rounded-full border border-obito-grey py-2 px-[14px] hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-light-green group-[.active]:border-obito-light-green">
                    <img src="{{ asset('assets/images/icons/uk.png') }}" class="flex shrink-0 w-5" alt="icon">
                    <span>Inggris</span>
                </a>
            </li>
            <li class="group">
                <a href="#" class="flex items-center gap-2 rounded-full border border-obito-grey py-2 px-[14px] hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-light-green group-[.active]:border-obito-light-green">
                    <img src="{{ asset('assets/images/icons/fr.png') }}" class="flex shrink-0 w-5" alt="icon">
                    <span>Perancis</span>
                </a>
            </li>
            <li class="group">
                <a href="#" class="flex items-center gap-2 rounded-full border border-obito-grey py-2 px-[14px] hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-light-green group-[.active]:border-obito-light-green">
                    <img src="{{ asset('assets/images/icons/deutch.png') }}" class="flex shrink-0 w-5" alt="icon">
                    <span>Jerman</span>
                </a>
            </li>
            <li class="group">
                <a href="#" class="flex items-center gap-2 rounded-full border border-obito-grey py-2 px-[14px] hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-light-green group-[.active]:border-obito-light-green">
                    <img src="{{ asset('assets/images/icons/china.png') }}" class="flex shrink-0 w-5" alt="icon">
                    <span>Mandarin</span>
                </a>
            </li>
            <li class="group">
                <a href="#" class="flex items-center gap-2 rounded-full border border-obito-grey py-2 px-[14px] hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-light-green group-[.active]:border-obito-light-green">
                    <img src="{{ asset('assets/images/icons/saudi.png') }}" class="flex shrink-0 w-5" alt="icon">
                    <span>Arab</span>
                </a>
            </li>
        </ul>
    </nav>

    <main class="flex flex-col gap-[30px] pb-10 mt-[30px]">
        <section class="flex items-center w-full max-w-[1000px] rounded-[20px] border border-obito-grey p-5 gap-[30px] bg-white mx-auto">
            <div id="thumbnail-container" class="flex relative w-[500px] h-[350px] shrink-0 rounded-[14px] overflow-hidden bg-obito-grey">
                <img src="assets/images/thumbnails/thumbnail-5.png" class="w-full h-full object-cover" alt="thumbnail">
                <p class="absolute bottom-[10px] left-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5 z-10">
                    <img src="assets/images/icons/like.svg" class="w-5 h-5" alt="icon">
                    <span class="font-semibold text-xs">4.8</span>
                </p>
                <button type="button" class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 z-10">
                    <img src="assets/images/icons/video-circle-green-fill.svg" class="flex w-[60px] h-[60px] shrink-0" alt="icon">
                </button>
            </div>
            <div id="course-info" class="flex flex-col justify-center gap-[30px]">
                <div class="flex flex-col gap-[10px]">
                    <h1 class="font-bold text-[28px] leading-[42px]">Introduction to British English</h1>
                </div>
                <div class="flex flex-col gap-4">
                    <p class="flex items-center gap-[6px]">
                        <img src="assets/images/icons/briefcase-green.svg" class="w-6 flex shrink-0" alt="icon">
                        <span class="font-semibold text-xl leading-[21px]">Beginner Level</span>
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="success-join.html" class="rounded-full py-[10px] px-5 gap-[10px] bg-obito-green hover:drop-shadow-effect transition-all duration-300">
                        <span class="font-semibold text-white">Mulai Belajar</span>
                    </a>
                    <a href="#" class="rounded-full border border-obito-grey py-[10px] px-5 gap-[10px] bg-white hover:border-obito-green transition-all duration-300">
                        <span class="font-semibold">Add to Bookmark</span>
                    </a>
                </div>
            </div>
        </section>
        <section class="flex items-center w-full max-w-[1000px] rounded-[20px] border border-obito-grey p-5 gap-[30px] bg-white mx-auto">
            <div id="thumbnail-container" class="flex relative w-[500px] h-[350px] shrink-0 rounded-[14px] overflow-hidden bg-obito-grey">
                <img src="assets/images/thumbnails/thumbnail-5.png" class="w-full h-full object-cover" alt="thumbnail">
                <p class="absolute bottom-[10px] left-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5 z-10">
                    <img src="assets/images/icons/like.svg" class="w-5 h-5" alt="icon">
                    <span class="font-semibold text-xs">4.8</span>
                </p>
                <button type="button" class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 z-10">
                    <img src="assets/images/icons/video-circle-green-fill.svg" class="flex w-[60px] h-[60px] shrink-0" alt="icon">
                </button>
            </div>
            <div id="course-info" class="flex flex-col justify-center gap-[30px]">
                <div class="flex flex-col gap-[10px]">
                    <h1 class="font-bold text-[28px] leading-[42px]">Basic Grammar Essentials</h1>
                </div>
                <div class="flex flex-col gap-4">
                    <p class="flex items-center gap-[6px]">
                        <img src="assets/images/icons/briefcase-green.svg" class="w-6 flex shrink-0" alt="icon">
                        <span class="font-semibold text-xl leading-[21px]">Beginner Level</span>
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="success-join.html" class="rounded-full py-[10px] px-5 gap-[10px] bg-obito-green hover:drop-shadow-effect transition-all duration-300">
                        <span class="font-semibold text-white">Mulai Belajar</span>
                    </a>
                    <a href="#" class="rounded-full border border-obito-grey py-[10px] px-5 gap-[10px] bg-white hover:border-obito-green transition-all duration-300">
                        <span class="font-semibold">Add to Bookmark</span>
                    </a>
                </div>
            </div>
        </section>
        <section class="flex items-center w-full max-w-[1000px] rounded-[20px] border border-obito-grey p-5 gap-[30px] bg-white mx-auto">
            <div id="thumbnail-container" class="flex relative w-[500px] h-[350px] shrink-0 rounded-[14px] overflow-hidden bg-obito-grey">
                <img src="assets/images/thumbnails/thumbnail-5.png" class="w-full h-full object-cover" alt="thumbnail">
                <p class="absolute bottom-[10px] left-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5 z-10">
                    <img src="assets/images/icons/like.svg" class="w-5 h-5" alt="icon">
                    <span class="font-semibold text-xs">4.8</span>
                </p>
                <button type="button" class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 z-10">
                    <img src="assets/images/icons/video-circle-green-fill.svg" class="flex w-[60px] h-[60px] shrink-0" alt="icon">
                </button>
            </div>
            <div id="course-info" class="flex flex-col justify-center gap-[30px]">
                <div class="flex flex-col gap-[10px]">
                    <h1 class="font-bold text-[28px] leading-[42px]">Vocabulary Building</h1>
                </div>
                <div class="flex flex-col gap-4">
                    <p class="flex items-center gap-[6px]">
                        <img src="assets/images/icons/briefcase-green.svg" class="w-6 flex shrink-0" alt="icon">
                        <span class="font-semibold text-xl leading-[21px]">Beginner Level</span>
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="success-join.html" class="rounded-full py-[10px] px-5 gap-[10px] bg-obito-green hover:drop-shadow-effect transition-all duration-300">
                        <span class="font-semibold text-white">Mulai Belajar</span>
                    </a>
                    <a href="#" class="rounded-full border border-obito-grey py-[10px] px-5 gap-[10px] bg-white hover:border-obito-green transition-all duration-300">
                        <span class="font-semibold">Add to Bookmark</span>
                    </a>
                </div>
            </div>
        </section>
        <section class="flex items-center w-full max-w-[1000px] rounded-[20px] border border-obito-grey p-5 gap-[30px] bg-white mx-auto">
            <div id="thumbnail-container" class="flex relative w-[500px] h-[350px] shrink-0 rounded-[14px] overflow-hidden bg-obito-grey">
                <img src="assets/images/thumbnails/thumbnail-5.png" class="w-full h-full object-cover" alt="thumbnail">
                <p class="absolute bottom-[10px] left-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5 z-10">
                    <img src="assets/images/icons/like.svg" class="w-5 h-5" alt="icon">
                    <span class="font-semibold text-xs">4.8</span>
                </p>
                <button type="button" class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 z-10">
                    <img src="assets/images/icons/video-circle-green-fill.svg" class="flex w-[60px] h-[60px] shrink-0" alt="icon">
                </button>
            </div>
            <div id="course-info" class="flex flex-col justify-center gap-[30px]">
                <div class="flex flex-col gap-[10px]">
                    <h1 class="font-bold text-[28px] leading-[42px]">Speaking Exercise</h1>
                </div>
                <div class="flex flex-col gap-4">
                    <p class="flex items-center gap-[6px]">
                        <img src="assets/images/icons/briefcase-green.svg" class="w-6 flex shrink-0" alt="icon">
                        <span class="font-semibold text-xl leading-[21px]">Beginner Level</span>
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="success-join.html" class="rounded-full py-[10px] px-5 gap-[10px] bg-obito-green hover:drop-shadow-effect transition-all duration-300">
                        <span class="font-semibold text-white">Mulai Belajar</span>
                    </a>
                    <a href="#" class="rounded-full border border-obito-grey py-[10px] px-5 gap-[10px] bg-white hover:border-obito-green transition-all duration-300">
                        <span class="font-semibold">Add to Bookmark</span>
                    </a>
                </div>
            </div>
        </section>
        <section class="flex items-center w-full max-w-[1000px] rounded-[20px] border border-obito-grey p-5 gap-[30px] bg-white mx-auto">
            <div id="thumbnail-container" class="flex relative w-[500px] h-[350px] shrink-0 rounded-[14px] overflow-hidden bg-obito-grey">
                <img src="assets/images/thumbnails/thumbnail-5.png" class="w-full h-full object-cover" alt="thumbnail">
                <p class="absolute bottom-[10px] left-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5 z-10">
                    <img src="assets/images/icons/like.svg" class="w-5 h-5" alt="icon">
                    <span class="font-semibold text-xs">4.8</span>
                </p>
                <button type="button" class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 z-10">
                    <img src="assets/images/icons/video-circle-green-fill.svg" class="flex w-[60px] h-[60px] shrink-0" alt="icon">
                </button>
            </div>
            <div id="course-info" class="flex flex-col justify-center gap-[30px]">
                <div class="flex flex-col gap-[10px]">
                    <h1 class="font-bold text-[28px] leading-[42px]">Writing Exercise</h1>
                </div>
                <div class="flex flex-col gap-4">
                    <p class="flex items-center gap-[6px]">
                        <img src="assets/images/icons/briefcase-green.svg" class="w-6 flex shrink-0" alt="icon">
                        <span class="font-semibold text-xl leading-[21px]">Beginner Level</span>
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="success-join.html" class="rounded-full py-[10px] px-5 gap-[10px] bg-obito-green hover:drop-shadow-effect transition-all duration-300">
                        <span class="font-semibold text-white">Mulai Belajar</span>
                    </a>
                    <a href="#" class="rounded-full border border-obito-grey py-[10px] px-5 gap-[10px] bg-white hover:border-obito-green transition-all duration-300">
                        <span class="font-semibold">Add to Bookmark</span>
                    </a>
                </div>
            </div>
        </section>
        <section class="flex items-center w-full max-w-[1000px] rounded-[20px] border border-obito-grey p-5 gap-[30px] bg-white mx-auto">
            <div id="thumbnail-container" class="flex relative w-[500px] h-[350px] shrink-0 rounded-[14px] overflow-hidden bg-obito-grey">
                <img src="assets/images/thumbnails/thumbnail-5.png" class="w-full h-full object-cover" alt="thumbnail">
                <p class="absolute bottom-[10px] left-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5 z-10">
                    <img src="assets/images/icons/like.svg" class="w-5 h-5" alt="icon">
                    <span class="font-semibold text-xs">4.8</span>
                </p>
                <button type="button" class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 z-10">
                    <img src="assets/images/icons/video-circle-green-fill.svg" class="flex w-[60px] h-[60px] shrink-0" alt="icon">
                </button>
            </div>
            <div id="course-info" class="flex flex-col justify-center gap-[30px]">
                <div class="flex flex-col gap-[10px]">
                    <h1 class="font-bold text-[28px] leading-[42px]">Conversation & Presentation</h1>
                </div>
                <div class="flex flex-col gap-4">
                    <p class="flex items-center gap-[6px]">
                        <img src="assets/images/icons/briefcase-green.svg" class="w-6 flex shrink-0" alt="icon">
                        <span class="font-semibold text-xl leading-[21px]">Intermediate</span>
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="success-join.html" class="rounded-full py-[10px] px-5 gap-[10px] bg-obito-green hover:drop-shadow-effect transition-all duration-300">
                        <span class="font-semibold text-white">Mulai Belajar</span>
                    </a>
                    <a href="#" class="rounded-full border border-obito-grey py-[10px] px-5 gap-[10px] bg-white hover:border-obito-green transition-all duration-300">
                        <span class="font-semibold">Add to Bookmark</span>
                    </a>
                </div>
            </div>
        </section>
    </main>
    
</body>
</html>