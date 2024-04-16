<div class="p-3" style="border: 2px solid blue">
    <form wire:submit="save">
        <label for="debt-name">Name</label>
        <input id="debt-name" type="text" wire:model="name">
        <label for="debt-amount">Amount</label>
        <input id="debt-amount" type="text" wire:model="amount">
        <div class="flex flex-col">

        @foreach ($users as $user)
            <div class="flex flex-row">
                <label for="user-{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</label>
                <input id="user-{{$user->id}}" type="checkbox" value="{{$user->id}}" wire:model="involved_users" />
            </div>
        @endforeach
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Save</button>
    </form>
</div>
