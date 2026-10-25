<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <div class="mt-6 flex gap-4">
                <a href="{{ route('auteurs.index') }}"
                   class="px-4 py-2 bg-gray-800 text-white rounded">
                    Auteurs
                </a>

                <a href="{{ route('livres.index') }}"
                   class="px-4 py-2 bg-gray-800 text-white rounded">
                    Livres
                </a>
            </div>

        </div>
    </div>
</x-app-layout>