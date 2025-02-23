<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel') }}
        </h2>
    </x-slot>

    <div class="pt-6 pb-2 sm:pt-8 sm:pb-4">
        <div class="max-w-fit mx-auto sm:px-6 lg:px-8">
            <div class="bg-cyan-10 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    Olá <span class="capitalize font-bold">{{ Auth::user()->name }}</span>, seja bem-vindo(a)!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
