<div class="p-2" style="border: 1px solid green">
    <livewire:add-debt-component  :users="$group->users" :group="$group"/>
    @foreach ($debts as $debt)
        <livewire:view-debt-component :debt="$debt" />
    @endforeach
</div>
