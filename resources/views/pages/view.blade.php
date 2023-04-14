<x-app-layout>
    <x-slot name="header" >
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Pages') }}
            </h2>
            <x-link-button href="{{route('pages.create')}}">Create Page</x-link-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Page Title
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3">
                    Slug
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3">
                    Published
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3">
                    Created at
                </th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>

    </table>
</div>

            </div>
        </div>
    </div>
</x-app-layout>
