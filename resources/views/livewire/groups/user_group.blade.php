<div>
    <p class="test">Groups you are a member of:</p>
    <a href="{{ url('/group', ['name' => $group->name]) }}"><strong>{{ $group->name }}</strong></a></br>
    @foreach ($group->users as $user)
        {{$user->first_name}} {{$user->last_name}}</br>
    @endforeach
</div>
