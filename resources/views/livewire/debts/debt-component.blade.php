<div>
    <p class="text-green-400">this is the top of the debt component</p>

    @foreach ($involved_users as $involved_user)
    <p class="{{in_array($involved_user->id, $paid_by) ? 'text-green-600' : 'text-red-600' }}">
        {{ $involved_user->first_name}} {{$involved_user->last_name}}
    </p>
    @endforeach
</div>

 <!-- horizontal display of each debt,
click as a dropdown to display full details (paid, not paid etc)
overall +/- kitty at the top by each person's name (what they owe/are owed) -->
