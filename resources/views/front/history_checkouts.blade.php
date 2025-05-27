@extends('front.layouts.layouts')
@section('title', 'History Transactions')
@section('content')
<x-nav-auth :user="auth()->user()" />
        <main class="relative flex flex-1 h-full">
            <div id="background-banner" class="absolute flex w-1/2 shrink-0 h-[56.3rem] overflow-hidden right-0">
                <img src="{{asset('assets/images/backgrounds/banner-subscription.jpg')}}" class="w-full h-full object-cover" alt="banner">
            </div>
            <section id="subscriptions-list" class="relative flex flex-col gap-5 mt-[50px] w-full max-w-[1280px] px-[75px] py-5 mx-auto">
                <h1 class="font-bold text-[28px] leading-[42px]">My Courses</h1>
                <div id="list-container" class="flex flex-col gap-5 max-w-[800px] w-full">
                    <div class="subscription-card bg-white border border-obito-grey flex items-center justify-between rounded-[20px] py-5 px-4 gap-8">
                        <div class="flex items-center flex-1 gap-[14px]">
                            <div>
                                <p class="font-bold text-lg">Pro Talent</p>
                                <p class="text-obito-text-secondary">3 months duration</p>
                            </div>
                        </div>
                        <div class="flex flex-col w-[100px] shrink-0 gap-1">
                            <div class="flex items-center gap-1">
                                <p class="text-sm">Price</p>
                            </div>
                            <p class="font-semibold text-sm">Rp 1.890.000</p>
                        </div>
                        <div class="flex flex-col w-[150px] shrink-0 gap-1">
                            <div class="flex items-center gap-1">
                                <p class="text-sm">Started At</p>
                            </div>
                            <p class="font-semibold text-sm">19 December 2024</p>
                        </div>
                        <div class="flex items-center justify-center w-[75px] shrink-0">
                            <span class="font-bold text-xs text-obito-green badge w-fit rounded-full py-[6px] px-[10px] gap-[6px] bg-obito-light-green">ACTIVE</span>
                        </div>
                        <a href="subscription-details.html" class="rounded-full border border-obito-grey py-[10px] px-5 gap-[10px] bg-white hover:border-obito-green transition-all duration-300">
                            <span class="font-semibold">Details</span>
                        </a>
                    </div>
                </div>
            </section>
        </main>
@endsection
