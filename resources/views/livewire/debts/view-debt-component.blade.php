<div class="mb-2" style="border: 1px solid purple">

    <div>
        @if (session()->has('message'))
            <div>
                <strong class="text-red-600">{{ session('message') }}</strong>
            </div>
        @endif
    </div>

    <!-- render this only if the creater is the current user -->
    <div style="position:relative;float:right;" class="p-1">
        <button wire:click="delete">X</button>
    </div>

    <div class="flex flex-col items-center">
        <div class="flex flex-col">
            <p>{{ $debt->name }}</p>
            <p>{{ $debt->amount }}</p>
        </div>
        
        <div class="flex flex-row justify-between">
        @foreach ($involved_users as $involved_user)
            <p class="font-bold border-2 rounded-full p-2 {{in_array($involved_user->id, $paid_by) ? 'border-green-600' : 'border-red-600' }}">
                {{ $involved_user->first_name[0] }}.{{$involved_user->last_name[0] }}
            </p>
        @endforeach
        </div>

        <div id="chevron-{{$debt->id}}">
            <i class="fa-solid fa-chevron-down"></i>
        </div>
        
    </div>
</div>
@script
<script>
    const chevron = document.getElementById(`chevron-${{!! $debt->id !!}}`);
    chevron.addEventListener('click',  function() {
        // yes this is dumb, look into better ways to do this with livewire
        console.log('hit', {!! $debt->id !!});
    });
</script>
@endscript

 <!-- horizontal display of each debt,
click as a dropdown to display full details (paid, not paid etc)
overall +/- kitty at the top by each person's name (what they owe/are owed) -->
