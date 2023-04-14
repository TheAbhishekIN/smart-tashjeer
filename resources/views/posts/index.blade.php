<x-app-layout>
    <x-slot name="header" >
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Posts') }}
            </h2>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<div class="relative overflow-x-auto">

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">User</span>
                </th>
                <th scope="col" class="px-6 py-3">
                    Plant Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Count
                </th>
                <th scope="col" class="px-6 py-3">
                    AI Count
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $post)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="w-32 p-4 font-semibold">
                    <img class="w-10 h-10 rounded-full" src="{{$post['user']['image']}}" alt="{{$post['user']['name']}}">
                    {{$post['user']['name']}}
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{$post['plantName']}}
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{$post['count']}}
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{$post['aiCount']}}
                </td>
                <td class="px-6 py-4">
                    <x-link-button href="{{route('posts.view', $post['id'])}}"> View</x-link-button>
                </td>
            </tr>
            @empty

            @endforelse
        </tbody>
    </table>
</div>

</div>

            </div>
        </div>
    </div>
</x-app-layout>
