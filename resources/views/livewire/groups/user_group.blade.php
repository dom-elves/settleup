<div>
    <a href="{{ url('/group', ['name' => $group->name]) }}"><strong>{{ $group->name }}</strong></a></br>
    {{ $group->debts }}
    @foreach ($group->users as $user)
        {{$user->first_name}} {{$user->last_name}}</br>
    @endforeach
</div>
