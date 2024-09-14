<div>
    {{-- todo: change this to route helper --}}
    <a href="{{ url('/group', ['name' => $group->name]) }}"><h4 class="text-xl">{{ $group->name }}</h4></a></br>
    {{ $group }}
    {{-- after writing relationships, probably just fill this with user first names --}}
</div>
