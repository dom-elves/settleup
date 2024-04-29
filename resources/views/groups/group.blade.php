<x-app-layout>
    <div>
        <h1>GROUP SUMMARY</h1>
        <h2>users</h2>
        @foreach ($group->users as $user)
            <p>{{ $user->first_name }} {{ $user->last_name}}</p>
        @endforeach
        </br>
        </br>
        <section id="debt-section" style="background:white">
            <div>
                <livewire:debt-component :users="$group->users" :group="$group" :debts="$debts"/>
            </div>
        </section>
    </div>
</x-app-layout>
