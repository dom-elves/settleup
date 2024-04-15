<x-app-layout>
    <h1>GROUP SUMMARY</h1>
    <h2>users</h2>
    @foreach ($group->users as $user)
    <p>{{ $user->first_name }} {{ $user->last_name}}</p>
    @endforeach
    </br>
    </br>

    <livewire:add-debt-component  :users="$group->users" :group="$group"/>
    
    <div class="p-2"style="border:2px solid green">
    @foreach ($debts as $debt)
    <livewire:view-debt-component :debt="$debt" />
    @endforeach
    </div>
</x-app-layout>
