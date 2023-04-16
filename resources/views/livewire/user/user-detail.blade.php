<div>
    <div class="grow flex flex-col md:translate-x-0 transition-transform duration-300 ease-in-out translate-x-0" >
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
        <!-- Profile background -->
        <div class="relative h-20 bg-slate-200">
        </div>
        <!-- Content -->
        <div class="relative px-4 sm:px-6 pb-8">
            <!-- Pre-header -->
            <div class="-mt-16 mb-6 sm:mb-3">
                <div class="flex flex-col items-center sm:flex-row sm:justify-between sm:items-end">
                    <!-- Avatar -->
                    <div class="inline-flex -ml-1 -mt-1 mb-4 sm:mb-0">
                        <img class="rounded-full border-4 border-white" src="{{$detail['image']}}" width="128" height="128" alt="Avatar">
                    </div>

                    <!-- Actions -->
                    <div class="flex space-x-2 sm:mb-2">
                        @if($confirming===0)
                            @if(isset($detail['isBlocked']) && $detail['isBlocked'])
                                <button wire:click="confirm(1)"
                                    class="bg-red-800 text-white w-32 px-4 py-1 hover:bg-red-600 rounded border">

                                    Unblock
                                </button>
                            @else
                                <button wire:click="confirm(1)"
                                class="bg-blue-800 text-white w-32 px-4 py-1 hover:bg-blue-600 rounded border">

                                Block
                                </button>
                            @endif

                        @else
                            <button wire:click="update(1)"
                                class="bg-red-600 text-white w-40 px-4 py-1 hover:bg-red-600 rounded border">are you sure ?</button>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Header -->
            <header class="text-center sm:text-left mb-6">
                <!-- Name -->
                <div class="inline-flex items-start mb-2">
                    <h1 class="text-2xl text-slate-800 font-bold">{{$detail['name'] ." - ". $detail['userName']}}</h1>

                </div>
                <!-- Bio -->
                <div class="text-sm mb-3">
                    <div class="text-sm flex">
                        <h3 class="font-medium text-slate-800">Points</h3>
                        <div class="pl-4">
                                <span class="text-sm font-semibold text-white px-1.5 bg-emerald-500 rounded-full">
                                    {{$detail['points']}}
                                </span>
                        </div>
                    </div>
                </div>
                <div class="text-sm mb-3">
                    <div class="text-sm flex">
                        <h3 class="font-medium text-slate-800">Bio:</h3>
                        <div class="pl-4">
                                    {{$detail['bio']}}
                        </div>
                    </div>
                </div>
                <!-- Meta -->
                <div class="flex flex-wrap justify-center sm:justify-start space-x-4">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 fill-current shrink-0 text-slate-400" viewBox="0 0 16 16">
                            <path d="M8 8.992a2 2 0 1 1-.002-3.998A2 2 0 0 1 8 8.992Zm-.7 6.694c-.1-.1-4.2-3.696-4.2-3.796C1.7 10.69 1 8.892 1 6.994 1 3.097 4.1 0 8 0s7 3.097 7 6.994c0 1.898-.7 3.697-2.1 4.996-.1.1-4.1 3.696-4.2 3.796-.4.3-1 .3-1.4-.1Zm-2.7-4.995L8 13.688l3.4-2.997c1-1 1.6-2.198 1.6-3.597 0-2.798-2.2-4.996-5-4.996S3 4.196 3 6.994c0 1.399.6 2.698 1.6 3.697 0-.1 0-.1 0 0Z"></path>
                        </svg>
                        <span class="text-sm font-medium whitespace-nowrap text-slate-500 ml-2">{{$detail['address'] ?? "-"}}</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 fill-current shrink-0 text-slate-400" viewBox="0 0 16 16">
                            <path d="M11 0c1.3 0 2.6.5 3.5 1.5 1 .9 1.5 2.2 1.5 3.5 0 1.3-.5 2.6-1.4 3.5l-1.2 1.2c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l1.1-1.2c.6-.5.9-1.3.9-2.1s-.3-1.6-.9-2.2C12 1.7 10 1.7 8.9 2.8L7.7 4c-.4.4-1 .4-1.4 0-.4-.4-.4-1 0-1.4l1.2-1.1C8.4.5 9.7 0 11 0ZM8.3 12c.4-.4 1-.5 1.4-.1.4.4.4 1 0 1.4l-1.2 1.2C7.6 15.5 6.3 16 5 16c-1.3 0-2.6-.5-3.5-1.5C.5 13.6 0 12.3 0 11c0-1.3.5-2.6 1.5-3.5l1.1-1.2c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4L2.9 8.9c-.6.5-.9 1.3-.9 2.1s.3 1.6.9 2.2c1.1 1.1 3.1 1.1 4.2 0L8.3 12Zm1.1-6.8c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-4.2 4.2c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l4.2-4.2Z"></path>
                        </svg>
                        <a class="text-sm font-medium whitespace-nowrap text-indigo-500 hover:text-indigo-600 ml-2" href="#0">{{$detail['email']}}</a>
                    </div>
                </div>
            </header>

            <!-- Profile content -->
            <div class="flex flex-col xl:flex-row xl:space-x-16">
                <aside class="xl:min-w-56 xl:w-56 space-y-3">
                    <div class="text-sm flex">
                        <h3 class="font-medium text-slate-800">Email Verified</h3>
                        <div class="pl-4">
                            @if($detail['isEmailVerified'])
                                <span class="text-sm font-semibold text-white px-1.5 bg-emerald-500 rounded-full">
                                    On
                                </span>
                            @else
                                <span class="text-sm font-semibold text-white px-1.5 bg-red-500 rounded-full">
                                    Off
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="text-sm flex">
                        <h3 class="font-medium text-slate-800">Notifications</h3>
                        <div class="pl-4">
                            @if(isset($detail['isNotification']) && $detail['isNotification'])
                                <span class="text-sm font-semibold text-white px-1.5 bg-emerald-500 rounded-full">
                                    On
                                </span>
                            @else
                                <span class="text-sm font-semibold text-white px-1.5 bg-red-500 rounded-full">
                                    Off
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="text-sm flex">
                        <h3 class="font-medium text-slate-800">Sound</h3>
                        <div class="pl-4">
                            @if(isset($detail['isSound']) && $detail['isSound'])
                                <span class="text-sm font-semibold text-white px-1.5 bg-emerald-500 rounded-full">
                                    On
                                </span>
                            @else
                                <span class="text-sm font-semibold text-white px-1.5 bg-red-500 rounded-full">
                                    Off
                                </span>
                            @endif
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
