<div>
    <div class="p-8">
        @if (session()->has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Success!</span> {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Error!</span> {{ session('error')}}
        </div>
    @endif
        <div class="border-gray-100">
          <dl class="divide-y divide-gray-100">
            <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">

                </dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 ml-auto">
                    <div class="">
                        @if($confirming===0)
                                @if(isset($post['isApproved']) && $post['isApproved'])
                                    <button wire:click="confirm(1)"
                                        class="bg-green-800 text-white w-32 px-4 py-1 hover:bg-green-600 rounded border">

                                        Approve?
                                    </button>
                                @else
                                    <button wire:click="confirm(1)"
                                    class="bg-red-800 text-white w-32 px-4 py-1 hover:bg-red-600 rounded border">

                                    Block?
                                    </button>
                                @endif

                            @else
                                <button wire:click="update(1)"
                                    class="bg-red-600 text-white w-40 px-4 py-1 hover:bg-red-600 rounded border">are you sure ?</button>
                            @endif
                    </div>
                </dd>
            </div>
            <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-sm font-medium leading-6 text-gray-900">Plant Name</dt>
              <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$post['plantName'] ?? "-"}}
            </dd>

            </div>
            <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-sm font-medium leading-6 text-gray-900">Count/AI Count</dt>
              <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$post['count'] ?? "-"}}/{{$post['aiCount'] ?? "-"}}</dd>
            </div>
            <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-sm font-medium leading-6 text-gray-900">Date</dt>
              <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$post['date']}}</dd>
            </div>
            <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-sm font-medium leading-6 text-gray-900">Location</dt>
              <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$post['location']}} <x-link-button href="https://www.google.com/maps/search/?api=1&query={{$post['latitude']}},{{$post['longitude']}}" target="_blank">Open Google Maps</x-link-button> </dd>
            </div>
            <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-sm font-medium leading-6 text-gray-900">User Details</dt>
              <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><b>Name : </b>  {{$user['name']}}</dd>
            </div>
            <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-sm font-medium leading-6 text-gray-900">Before Picture</dt>
              <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                <img src="{{$post['beforePic']}}" class="h-48 w-96" alt="">
              </dd>
            </div>
            <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">After Picture</dt>
                <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                  <img src="{{$post['afterPic']}}" class="h-48 w-96 " alt="">
                </dd>
              </div>
          </dl>
        </div>
      </div>
</div>
