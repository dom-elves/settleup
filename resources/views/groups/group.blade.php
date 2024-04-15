<x-app-layout>
    <h1>group summary</h1>
    <h2>users</h2>
    @foreach ($group->users as $user)
    <p>{{ $user->first_name }} {{ $user->last_name}}</p>
    @endforeach
    </br>
    </br>

    @foreach ($debts as $debt)
    <livewire:view-debt-component :debt="$debt" />
    @endforeach

    <livewire:add-debt-component  :users="$group->users"/>
</x-app-layout>
