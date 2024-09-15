<div>
    {{-- todo: change this to route helper --}}
    <a href="{{ url('/group', ['name' => $group->name]) }}"><h4 class="text-xl">{{ $group->name }}</h4></a></br>
          {{ $group }}
     @foreach ($group->group_users as $group_user)
        {{ $group_user->user->getFullName() }}<br>
    @endforeach
    {{-- after writing relationships, probably just fill this with user first names --}}
</div>
