<div>
    @foreach ($group->users as $user)
        {{$user->first_name}} {{$user->last_name}}</br>
    @endforeach
</div>
