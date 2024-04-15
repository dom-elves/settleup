<div>
    <p class="text-green-400">this is the top of the debt component</p>
    <div class="flex flex-row justify-between">
    @foreach ($involved_users as $involved_user)
    <p class="font-bold border-2 rounded-full p-2 {{in_array($involved_user->id, $paid_by) ? 'border-green-600' : 'border-red-600' }}">
        {{ $involved_user->first_name[0] }}.{{$involved_user->last_name[0] }}
    </p>
    @endforeach
    </div>
</div>

 <!-- horizontal display of each debt,
click as a dropdown to display full details (paid, not paid etc)
overall +/- kitty at the top by each person's name (what they owe/are owed) -->
