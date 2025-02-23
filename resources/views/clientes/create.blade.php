<x-app-layout>

    <x-slot name="title">
        {{ __('Cadastro de cliente') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastro') }}
        </h2>
    </x-slot>

    <div class="pt-6 pb-2 sm:pt-8 sm:pb-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-cyan-10 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Cadastro de Cliente") }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-cyan-10 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('clientes.store') }}">

                        @csrf
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Novo Cliente</h2>
                                <p class="mt-1 text-sm leading-6 text-gray-600">Esta informação será exibida publicamente, então tenha cuidado com o que compartilha.</p>

                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">
                                            Nome
                                        </label>
                                        <div class="mt-2">
                                            <input type="text" name="name" id="name"
                                                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset
                                                    placeholder:text-gray-400 sm:text-sm sm:leading-6
                                                    {{ $errors->has('name') ? 'ring-pink-600 focus:ring-pink-600' : 'ring-gray-300 focus:ring-cyan-600' }}"
                                                    placeholder="Digite o nome">
                                            @error('name')
                                            <span class="text-pink-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">
                                            E-mail
                                        </label>
                                        <div class="mt-2">
                                            <input id="email" name="email" type="email"
                                                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset
                                                    placeholder:text-gray-400 sm:text-sm sm:leading-6
                                                    {{ $errors->has('email') ? 'ring-pink-600 focus:ring-pink-600' : 'ring-gray-300 focus:ring-cyan-600' }}"
                                                    placeholder="Digite o e-mail">
                                            @error('email')
                                            <span class="text-pink-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="telephone"
                                               class="block text-sm font-medium leading-6 text-gray-900">
                                            Telefone
                                        </label>
                                        <div class="mt-2">
                                            <input id="telephone" name="telephone" type="tel"
                                                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset
                                                    placeholder:text-gray-400 sm:text-sm sm:leading-6
                                                    {{ $errors->has('telephone') ? 'ring-pink-600 focus:ring-pink-600' : 'ring-gray-300 focus:ring-cyan-600' }}"
                                                    placeholder="Digite o telefone">
                                            @error('telephone')
                                            <span class="text-pink-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="zip_code" class="block text-sm font-medium leading-6 text-gray-900">
                                            CEP
                                        </label>
                                        <div class="mt-2">
                                            <input id="zip_code" name="zip_code" type="text"
                                                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset
                                                    placeholder:text-gray-400 sm:text-sm sm:leading-6
                                                    {{ $errors->has('zip_code') ? 'ring-pink-600 focus:ring-pink-600' : 'ring-gray-300 focus:ring-cyan-600' }}"
                                                    placeholder="Digite o CEP">
                                            @error('zip_code')
                                            <span class="text-pink-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="address" class="block text-sm font-medium leading-6 text-gray-900">
                                            Endereço
                                        </label>
                                        <div class="mt-2">
                                            <input id="address" name="address" type="tel"
                                                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset
                                                    placeholder:text-gray-400 sm:text-sm sm:leading-6
                                                    {{ $errors->has('address') ? 'ring-pink-600 focus:ring-pink-600' : 'ring-gray-300 focus:ring-cyan-600' }}"
                                                    placeholder="Digite o endereço">
                                            @error('address')
                                            <span class="text-pink-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                {{-- Botão Voltar --}}
                                <a href="{{ route('clientes.index') }}"
                                   class="text-sm font-semibold leading-6 text-gray-900 hover:text-gray-700">
                                    Voltar
                                </a>
                                {{-- Botão Cadastrar --}}
                                <button type="submit" class="inline-flex items-center text-center px-4 py-2 bg-violet-700 hover:bg-violet-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Cadastrar
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
