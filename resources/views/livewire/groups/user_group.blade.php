<div>
    <a href="{{ url('/group', ['name' => $group->name]) }}"><h4 class="text-xl">{{ $group->name }}</h4></a></br>
    @foreach ($group->users as $user)
        {{$user->first_name}} {{$user->last_name}}</br>
    @endforeach
</div>
