<x-app-layout>
    <x-slot name="header" >
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Mews') }}
            </h2>
            <x-link-button href="{{route('news.create')}}">Create News</x-link-button>
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
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Slug
                </th>
                <th scope="col" class="px-6 py-3">
                    Published
                </th>
                <th scope="col" class="px-6 py-3">
                    Created at
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $page)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$page['title'] ?? "-"}}
                    </th>
                    <td class="px-6 py-4">
                        {{$page['slug'] ?? "-"}}
                    </td>

                    <td class="px-6 py-4">
                       @isset($page['published'])
                            @if($page['published'])
                                <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">True</span>
                            @else
                                <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">False</span>
                            @endif
                        @endisset
                    </td>
                    <td class="px-6 py-4">
                        {{$page['date'] ?? "-"}}
                    </td>
                    <td class="px-6 py-4">
                        {{-- <x-link-button href="">View</x-link-button> --}}
                        <x-link-button href="{{route('news.edit', $page['id'])}}" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium rounded-lg text-sm px-4 py-2 text-center dark:focus:ring-blue-900">Edit</x-link-button>
                    </td>
                </tr>
            @empty
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4" colspan="4">
                        No record found!
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

            </div>
        </div>
    </div>
</x-app-layout>
