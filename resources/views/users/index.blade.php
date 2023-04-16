<x-app-layout>
    <x-slot name="header" >
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<div class="relative overflow-x-auto">

<div class="relative overflow-x-auto shadow-md sm:rounded-lg p-8">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="table">
        <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">User</span>
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Username
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Points
                </th>
                <th scope="col" class="px-6 py-3">
                    Create Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $key => $user)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="w-32 p-4 font-semibold">
                    <img class="w-10 h-10 rounded-full" src="{{$user['image']}}" alt="{{$user['name']}}">
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{$user['name'] ? $user['name'] : "-"}}
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{$user['userName']}}
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{$user['email']}}
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{$user['points']}}
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{date('F jS Y \T h:i:s a', strtotime($user['created']))}}
                </td>
                <td class="px-6 py-4">
                    <x-link-button href="{{route('users.view', $user['id'])}}"> View</x-link-button>
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
@push('head')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endpush

@push('foooter')
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
                $('#table').DataTable({
                dom: '<"flex flex-wrap items-center justify-between"<"my-2"l><"my-2"f><"my-2"B>>rtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        });

    </script>
@endpush
</x-app-layout>
