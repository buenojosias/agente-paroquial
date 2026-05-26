<x-app-layout>
    <x-ts-card header="Bem vindo ao Agente Paroquial">
        Paróquia selecionada: {{ auth()->user()->selectedParish->name }}<br>
        Função 
        @dump(auth()->user()->getRoleInSelectedParish())
    </x-ts-card>
</x-app-layout>
