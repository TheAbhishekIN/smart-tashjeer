<x-app-layout>
    <x-slot name="header" >
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Update Green Guide') }}
            </h2>
            <x-link-button href="{{route('pages.index')}}">Back</x-link-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
               @livewire('pages.create-edit', ['slug' => $slug])
            </div>
        </div>
    </div>

</x-app-layout>
