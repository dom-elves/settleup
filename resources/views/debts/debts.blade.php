<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Debts') }}
        </h2>
    </x-slot>
    <div>
        <p>debts laravel blade</p>
        <p>debts you are a part of</p>
        @foreach ($debts as $debt)
            <p>group: {{$debt->group->name}}</p>
            <p>debt name: {{$debt->name}}, amount: {{$debt->amount}}</p>
        @endforeach
    </div>
</x-app-layout>