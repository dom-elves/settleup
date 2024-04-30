<div class="mb-2" style="border: 1px solid purple">
    <div>
        @if (session()->has('remove'))
            <div>
                <strong class="text-red-600">{{ session('remove') }}</strong>
            </div>
        @endif
    </div>

    @if (auth()->user()->id === $debt->created_by_user_id)
        <div style="position:relative;float:right;" class="p-1">
            <button popovertarget="my-popover"> Open Popover </button>

            <div id="my-popover" popover style="background-color:cyan;">
                <button wire:click="delete({{$debt}})" class="p-2" style="border:2px solid green">remove x</button>
                <button class="p-2" style="border:2px solid green">edit</button>
                <button class="p-2" style="border:2px solid green">any other option</button>
            </div>
        </div>
    @endif

    <div class="flex flex-col items-center">
        <div class="flex flex-col">
            <strong>{{ $debt->name }}</strong>
            <div class="flex flex-row">
                <p>total:</p>
                <p>{{ $debt->amount }}</p>
            </div>
            <div class="flex flex-row">
                <p>split:</p>
                <p>{{ $debt->amount / count(json_decode($debt->involved_users))}}</p>
            </div>
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
    // const chevron = document.getElementById(`chevron-${{!! $debt->id !!}}`);
    // chevron.addEventListener('click',  function() {
    //     // yes this is dumb, look into better ways to do this with livewire
    //     console.log('hit', {!! $debt->id !!});
    // });
</script>
@endscript

 <!-- horizontal display of each debt,
click as a dropdown to display full details (paid, not paid etc)
overall +/- kitty at the top by each person's name (what they owe/are owed) -->
