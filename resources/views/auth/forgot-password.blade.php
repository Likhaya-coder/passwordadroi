<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @stack('styles')
</head>
<body>
    <x-guest-layout>
        <div class="main container mx-auto">
            <div class="container-forgot-password max-w-2xl mx-auto py-8">
                <div id="advertisement" class="max-w-2xl mx-auto mb-8">
                    <video width="100%" style="border: none; outline: none;" id="adVideo" autoplay muted playsinline>
                        <source id="videoSource" src="{{ asset('videos/adv1.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p class="text-center text-sm text-gray-600 mt-2">This is a video advertisement. Are you interested?</p>
                    {{-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5164847289496611"
                        crossorigin="anonymous"></script>
                    <!-- PassWiz -->
                    <ins class="adsbygoogle"
                        style="display:block"
                        data-ad-client="ca-pub-5164847289496611"
                        data-ad-slot="7906708930"
                        data-ad-format="auto"
                        data-full-width-responsive="true"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script> --}}
                </div>

                <form id="interestForm" class="container-advert bg-gray-800 text-white rounded-lg shadow-lg p-6" action="{{ route('interest.store') }}" method="POST" style="display: none;">
                    @csrf
                    <h3 class="text-lg font-semibold mb-4">Are you interested in buying this product?</h3>
                    <div class="flex items-center mb-4">
                        <input type="radio" id="interestYes" name="interest" value="yes" class="mr-2">
                        <label for="interestYes" class="text-white">Yes</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input type="radio" id="interestNo" name="interest" value="no" class="mr-2">
                        <label for="interestNo" class="text-white">No</label>
                    </div>

                    <div id="dateInput" class="hidden">
                        <label for="buyDate" class="text-white">When do you plan to buy?</label>
                        <input type="date" id="buyDate" name="buyDate" class="block w-full mt-1 mb-4 bg-gray-700 text-white p-2 rounded-md">
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                        Submit
                    </button>
                </form>
            </div>
        </div>

        @stack('scripts')
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ asset('js/advert-simulation.js') }}"></script>
    </x-guest-layout>
</body>
</html>
 



