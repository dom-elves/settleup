<x-app-layout>
    <p class="test">Groups you are a member of:</p>
    {{ $groups }}
    {{-- @foreach ($groups as $group)
        <div class="max-w-7xl sm:px-6 lg:px-8 mt-3">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <livewire:user-group :group="$group" />
                </div>
            </div>
        </div>
    @endforeach --}}
</x-app-layout>
