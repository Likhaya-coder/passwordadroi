<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="bg-gray-700 font-sans leading-normal tracking-normal">

        <div class="flex flex-no-wrap">
    
            <!-- Sidebar -->
            <div class="w-64 bg-gray-800 text-white min-h-screen">
                <nav class="mt-10">
                    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
                        Home
                    </a>
                    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
                        Total Interested Users
                    </a>
                    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
                        Common Purchase Dates
                    </a>
                    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
                        Product Popularity
                    </a>
                    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
                        Sign-Up Rates
                    </a>
                </nav>
            </div>
    
            <!-- Main Content -->
            <div class="flex-grow">
                <div class="container mx-auto p-6">
                    <div class="bg-gray-800 text-white shadow-md rounded my-6 p-6">
                        <h2 class="text-2xl font-bold mb-4">Total Interested Users</h2>
                        <p class="text-xl">Total: <span class="font-semibold">350</span></p>
                    </div>
    
                    <div class="bg-gray-800 text-white shadow-md rounded my-6 p-6">
                        <h2 class="text-2xl font-bold mb-4">Common Purchase Dates</h2>
                        <table class="min-w-full bg-gray-800">
                            <thead>
                                <tr>
                                    <th class="py-2">Date</th>
                                    <th class="py-2">Number of Purchases</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border px-4 py-2">2024-07-19</td>
                                    <td class="border px-4 py-2">150</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2">2024-07-20</td>
                                    <td class="border px-4 py-2">100</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2">2024-07-21</td>
                                    <td class="border px-4 py-2">75</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
    
                    <div class="bg-gray-800 text-white shadow-md rounded my-6 p-6">
                        <h2 class="text-2xl font-bold mb-4">Product Popularity</h2>
                        <table class="min-w-full bg-gray-800">
                            <thead>
                                <tr>
                                    <th class="py-2">Product Title</th>
                                    <th class="py-2">Interested Users</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border px-4 py-2">Coral Fleece Fitted Electric Blanket</td>
                                    <td class="border px-4 py-2">120</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2">Marco Tripod Stool - Black</td>
                                    <td class="border px-4 py-2">90</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2">Bolt Cutter 750mm</td>
                                    <td class="border px-4 py-2">80</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2">House of Hamilton - Single Continental Pillow</td>
                                    <td class="border px-4 py-2">60</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
    
                    <div class="bg-gray-800 text-white shadow-md rounded my-6 p-6">
                        <h2 class="text-2xl font-bold mb-4">Email Sign-Up Rates</h2>
                        <p class="text-xl">Sign-Ups: <span class="font-semibold">75%</span></p>
                    </div>
    
                </div>
            </div>
        </div>
    
    </div>
</x-app-layout>
