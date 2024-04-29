<div class="p-3 mb-2" style="border: 1px solid blue">
    <div>
        @if (session()->has('success'))
            <div>
                <strong class="text-green-600">{{ session('success') }}</strong>
            </div>
        @endif
    </div>
 
    <form wire:submit="save">
        <div class="flex flex-col">
            @error('name')
                <small class="text-red-600">{{ $message }}</small>
            @enderror
            <div class="flex flex-row">
                <label for="debt-name">Name</label>
                <input id="debt-name" type="text" wire:model="name">
            </div>
        </div>
        <div>
            @error('amount')
                <small class="text-red-600">{{ $message }}</small>
            @enderror
            <div class="flex flex-row">
                <label for="debt-amount">Amount</label>
                <input id="debt-amount" type="text" wire:model="amount">
            </div>
        </div>
        <div class="flex flex-col">
            @error('involved_users')
                <small class="text-red-600">{{ $message }}</small>
            @enderror 
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
