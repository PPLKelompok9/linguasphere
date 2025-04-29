<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Linguasphere - Courses</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="bg-gray-50 flex flex-col min-h-screen overflow-hidden">
        <header class="w-full h-24 bg-teal-700 shadow-xl/30 flex items-center justify-center">
            <div class="flex items-center gap-4 ">
                <img src="{{ asset('assets/icons/united-kingdom.png') }}" alt="" class="w-10 h-10">
                <h1 class="font-bold text-3xl text-white text-center">Language Course</h1>
            </div>
        </header>
        <div class="flex flex-1 overflow-hidden">
            <x-sidebar-dashboard></x-sidebar-dashboard>
            <main class="relative flex-1 ml-[30rem] mt-[5rem] mr-[5rem] overflow-y-auto ">
                <div class="flex flex-wrap items-center gap-5 h-[90%]  bg-white shadow-xl rounded-xl p-10">
                    @foreach($coursesByCategory as $category => $courses)
                    <a href="{{ route('courses.detail') }}" class="mx-auto rounded-xl h-[20rem] w-[20rem] flex flex-col justify-center items-center bg-teal-700 shadow-xl/20 transform transition duration-200 hover:-translate-y-5 hover:translate-x-3 hover:shadow-2xl/30 ">
                            <img src="{{ Storage::url($courses->first()->category->images) ?? asset('assets/icons/japan.png') }}" class="w-24" alt="logo" srcset="">
                            <p class="text-white font-bold text-3xl mt-5">{{ $category }} <span>Course</span></p>
                    </a>
                    
                    @endforeach
                    {{-- <div class="mx-auto rounded-xl h-[20rem] w-[20rem] flex flex-col justify-center items-center bg-teal-700 shadow-xl/20 transform transition duration-200 hover:-translate-y-5 hover:translate-x-3 hover:shadow-2xl/30 ">
                        <img src="{{ asset('assets/icons/german.png') }}" class="w-24" alt="" srcset="">
                        <p class="text-white font-bold text-3xl mt-5">France <span>Course</span></p>
                    </div>
                    <div class="mx-auto rounded-xl h-[20rem] w-[20rem] flex flex-col justify-center items-center bg-teal-700 shadow-xl/20 transform transition duration-200 hover:-translate-y-5 hover:translate-x-3 hover:shadow-2xl/30">
                        <img src="{{ asset('assets/icons/japan.png') }}" class="w-24" alt="" srcset="">
                        <p class="text-white font-bold text-3xl mt-5">France <span>Course</span></p>
                    </div>
                    <div class="mx-auto rounded-xl h-[20rem] w-[20rem] flex flex-col justify-center items-center bg-teal-700 shadow-xl/20 transform transition duration-200 hover:-translate-y-5 hover:translate-x-3 hover:shadow-2xl/30 ">
                        <img src="{{ asset('assets/icons/france.png') }}" class="w-24" alt="" srcset="">
                        <p class="text-white font-bold text-3xl mt-5">France <span>Course</span></p>
                    </div>
                    <div class="mx-auto rounded-xl h-[20rem] w-[20rem] flex flex-col justify-center items-center bg-teal-700 shadow-xl/20 transform transition duration-200 hover:-translate-y-5 hover:translate-x-3 hover:shadow-2xl/30 ">
                        <img src="{{ asset('assets/icons/france.png') }}" class="w-24" alt="" srcset="">
                        <p class="text-white font-bold text-3xl mt-5">France <span>Course</span></p>
                    </div>
                    <div class="mx-auto rounded-xl h-[20rem] w-[20rem] flex flex-col justify-center items-center bg-teal-700 shadow-xl/20 transform transition duration-200 hover:-translate-y-5 hover:translate-x-3 hover:shadow-2xl/30 ">
                        <img src="{{ asset('assets/icons/france.png') }}" class="w-24" alt="" srcset="">
                        <p class="text-white font-bold text-3xl mt-5">France <span>Course</span></p>
                    </div> --}}
                </div>
                
            </main>
        </div>   
     
    
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>