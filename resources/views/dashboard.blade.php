<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                <div class="bg-white py-24 sm:py-32">
                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                      <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-3">
                        <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                          <dt class="text-base leading-7 text-gray-600">Total Users</dt>
                          <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{$stats['users'] ?? 0}}</dd>
                        </div>

                        <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                          <dt class="text-base leading-7 text-gray-600">Contributions</dt>
                          <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{$stats['posts'] ?? 0}}</dd>
                        </div>

                        <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                          <dt class="text-base leading-7 text-gray-600">Green Guides</dt>
                          <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{$stats['greenGuides'] ?? 0}}</dd>
                        </div>
                      </dl>
                    </div>
                  </div>

            </div>
        </div>
    </div>
</x-app-layout>
