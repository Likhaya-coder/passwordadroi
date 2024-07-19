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
                    <div class="ad-image-container relative">
                        <img id="adImage" src="{{ asset('images/ad1.jpg') }}" alt="Advertisement" width="100%" style="border: none; outline: none;">
                        <div class="ad-promotion-badge w-11 absolute top-2 left-2 bg-blue-600 text-white text-xs px-3 pt-1 rounded">
                            Promotion <br> OFF
                        </div>
                        <div class="ad-details absolute bottom-0 left-0 right-0 bg-white px-4 py-2">
                            <p class="ad-title font-thin text-gray-500 text-md mb-1">Product Title</p>
                            <p class="ad-price text-black font-extrabold">Price: R100</p>
                        </div>
                    </div>
                </div>

                <form id="interestForm" class="container-advert bg-gray-800 text-white rounded-lg shadow-lg p-6" action="{{ route('interest.store') }}" method="POST" style="display: none;">
                    @csrf
                    <p class="mb-4">Are you interested on buying the product?</p>

                    <input type="hidden" name="product_title" id="productTitle" value="">
                    <input type="hidden" name="price" id="price" value="">
                    <input type="hidden" name="promotion" id="promotion" value="">

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

                    <p class="py-4">Signup to receive products on promotion</p>
                    <div class="mb-8">
                        <x-input-label for="user_email" :value="__('Email')" />
                        <x-text-input id="user_email" class="block mt-1 w-full" type="email" name="user_email" :value="old('user_email')" required autofocus />
                        <x-input-error :messages="$errors->get('user_email')" class="mt-2" />
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
