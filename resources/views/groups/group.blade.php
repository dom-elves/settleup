<x-app-layout>
    <h1>group summary</h1>
    <h2>users</h2>
    @foreach ($group->users as $user)
    <p>{{ $user->first_name }} {{ $user->last_name}}</p>
    @endforeach
    </br>
    </br>

    @foreach ($debts as $debt)
    <livewire:debt-component :debt="$debt" />
    @endforeach
</x-app-layout>
