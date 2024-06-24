<x-guest-layout>
    <div class="main container mx-auto">
        <div class="container-forgot-password max-w-2xl mx-auto py-8">
            <div id="advertisement" class="max-w-2xl mx-auto mb-8">
                <video width="100%" style="border: none; outline: none;" id="adVideo" autoplay muted playsinline>
                    <source id="videoSource" src="{{ asset('videos/adv1.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p class="text-center text-sm text-gray-600 mt-2">This is a video advertisement. Are you interested?</p>
                <button id="skipButton" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg mt-4">
                    Skip Ad
                </button>
            </div>
            

            <form id="interestForm" class="container-advert bg-gray-800 text-white rounded-lg shadow-lg p-6" style="display: none;">
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

            <div id="reset-password" style="display: none;">
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" id="resetPasswordForm">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button>
                            {{ __('Email Password Reset Link') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('js/advert-simulation.js') }}"></script>
    @endpush
</x-guest-layout>
