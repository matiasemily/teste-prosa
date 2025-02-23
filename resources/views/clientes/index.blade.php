<x-app-layout>

    {{-- Slot de Título da Página --}}
    <x-slot name="title">
        {{ __('Clientes') }}
    </x-slot>

    {{-- Slot de Título --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clientes') }}
        </h2>
    </x-slot>

    {{-- Cabeçalho --}}
    <div class="py-3">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-cyan-10 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full p-6 flex items-center justify-between text-gray-900 flex-col md:flex-row gap-2">

                    {{-- Título --}}
                    <span class="text-xl font-semibold">{{ __("Listagem de Clientes") }}</span>

                    {{-- Formulário de Pesquisa e Botões --}}
                    <div class="w-full md:w-2/3 md:min-w-fit flex items-center space-x-4 justify-center">
                        <form method="GET" action="{{ route('clientes.index') }}" class="w-full md:w-2/3 md:min-w-fit flex flex-col sm:flex-row items-center space-x-4 gap-2">
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Pesquisar nome ou e-mail"
                                   class="w-full block px-3 py-2 border border-slate-200 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-slate-200 w-80 text-sm">

                            {{-- Botões de Filtro e Limpar --}}
                            <div class="flex flex-row gap-2">
                                <button class="inline-flex items-center px-4 py-2 bg-pink-600 hover:bg-pink-700 focus:bg-pink-700 active:bg-pink-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Filtrar
                                </button>

                                <a href="{{ route('clientes.index') }}"
                                   class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Limpar
                                </a>
                            </div>
                        </form>
                    </div>

                    {{-- Botão de criação de cliente --}}
                    <a href="{{ route('clientes.create') }}"
                       class="inline-flex items-center text-center px-4 py-2 bg-violet-700 hover:bg-violet-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Criar Cliente
                    </a>

                </div>
            </div>
        </div>
    </div>

    {{-- Tabela de Clientes --}}
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-slate-50">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Nome</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Telefone</th>
                    <th scope="col" class="px-6 py-3">CEP</th>
                    <th scope="col" class="px-6 py-3">Endereço</th>
                    <th scope="col" class="px-6 py-3">Cadastrado Em</th>
                    <th scope="col" class="px-6 py-3">Última Atualização</th>
                    <th scope="col" class="px-6 py-3">Ação</th>
                </tr>
                </thead>
                <tbody>
                @forelse($clientes as $cliente)
                    {{--  Caso existam clientes, a lista será exibida --}}
                    <tr class="odd:bg-white even:bg-slate-50 hover:bg-cyan-100">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-gray-600">{{ $cliente->id }}</th>
                        <td class="px-6 py-4">{{ $cliente->name }}</td>
                        <td class="px-6 py-4">{{ $cliente->email }}</td>
                        <td class="px-6 py-4">{{ $cliente->telephone }}</td>
                        <td class="px-6 py-4">{{ $cliente->zip_code }}</td>
                        <td class="px-6 py-4">{{ $cliente->address }}</td>
                        <td class="px-6 py-4">{{ $cliente->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-4">{{ $cliente->updated_at->format('d/m/Y H:i') }}</td>

                        {{-- Botão de Detalhes --}}
                        <td class="px-6 py-4">
                            <button type="button" onclick="openModal({{ $cliente }})"
                                    class="bg-pink-100 hover:bg-pink-200 text-pink-600 border-pink-100 text-xs font-semibold px-1 py-1 rounded border inline-flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4">
                                    <path fill="currentColor" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152L0 424c0 48.6 39.4 88 88 88l272 0c48.6 0 88-39.4 88-88l0-112c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 112c0 22.1-17.9 40-40 40L88 464c-22.1 0-40-17.9-40-40l0-272c0-22.1 17.9-40 40-40l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L88 64z"/>
                                </svg>
                            </button>
                        </td>

                {{-- Caso a lista esteja vazia, exibe a mensagem --}}
                @empty
                    <tr>
                        <td colspan="9" class="bg-cyan-10 px-6 py-4 text-center text-gray-900 whitespace-nowrap">Nenhum cliente encontrado.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Paginação --}}
    <div class="py-3 max-w-8xl mx-auto sm:px-6 lg:px-8">
        @if ($clientes->hasPages())
            <div class="p-3 bg-cyan-10 overflow-hidden shadow-sm sm:rounded-lg">
                {{ $clientes->links() }}
            </div>
        @endif
    </div>

    {{-- Modal de Detalhes --}}
    <div id="modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity backdrop-blur-md"></div>
            <div class="bg-cyan-10 rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                <div class="bg-cyan-10 p-6 text-gray-900">
                    <h3 id="modal-name" class="text-lg font-medium"></h3>
                    <p class="font-bold mt-2 text-sm text-gray-600">E-mail: <span id="modal-email" class="font-light"></span></p>
                    <p class="font-bold mt-2 text-sm text-gray-600">Telefone: <span id="modal-telephone" class="font-light"></span></p>
                    <p class="font-bold mt-2 text-sm text-gray-600">CEP: <span id="modal-zip_code" class="font-light"></span></p>
                    <p class="font-bold mt-2 text-sm text-gray-600">Endereço: <span id="modal-address" class="font-light"></span></p>
                    <p class="font-bold mt-2 text-sm text-gray-600">Criado em: <span id="modal-created_at" class="font-light"></span></p>
                    <p class="font-bold mt-2 text-sm text-gray-600">Última Atualização: <span id="modal-updated_at" class="font-light"></span></p>
                </div>

                <div class="bg-violet-50 px-4 py-3 sm:px-6 flex justify-end space-x-3">
                    {{-- Botões de Editar --}}
                    <a id="editButton" class="uppercase inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-violet-600 text-base font-medium text-white shadow-sm hover:bg-violet-700 sm:text-sm">
                        Editar
                    </a>

                    {{-- Botão de Fechar --}}
                    <button id="closeModalButton" class="uppercase inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-gray-600 text-base font-medium text-white shadow-sm hover:bg-gray-700 sm:text-sm">
                        Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Script para abrir e fechar o modal --}}
    <script>
        function openModal(cliente) {
            {{-- Ajustando os valores do modal --}}
            document.getElementById('modal-name').innerText = cliente.name;
            document.getElementById('modal-email').innerText = cliente.email;
            document.getElementById('modal-telephone').innerText = cliente.telephone;
            document.getElementById('modal-zip_code').innerText = cliente.zip_code;
            document.getElementById('modal-address').innerText = cliente.address;

            {{-- Ajustando os valores de data --}}
            document.getElementById('modal-created_at').innerText = new Date(cliente.created_at).toLocaleString('pt-BR');
            document.getElementById('modal-updated_at').innerText = new Date(cliente.updated_at).toLocaleString('pt-BR');

            {{-- Ajustando o link de edição --}}
            document.getElementById('editButton').href = `/clientes/${cliente.id}/edit`;

            {{-- Exibindo o modal --}}
            document.getElementById('modal').classList.remove('hidden');

            {{-- Fechando o modal --}}
            document.getElementById('closeModalButton').addEventListener('click', function () {
                document.getElementById('modal').classList.add('hidden');
            });
        }
    </script>

</x-app-layout>