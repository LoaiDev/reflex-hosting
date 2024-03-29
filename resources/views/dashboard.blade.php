<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-center">Your Servers</h2>
                    @foreach($servers as $server)
                        {{Arr::get($server, 'attributes.names')}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    <script src="//code.tidio.co/1v4w0tkpovrfmmb2xqfngqx3yvztwsls.js" async></script>
</x-app-layout>
