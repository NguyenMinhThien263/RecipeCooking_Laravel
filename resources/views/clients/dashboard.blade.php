@extends('clients.index')
@section('content_data')
    <div class="min-w-0">
        <div id="recipes-list-container">
            <ul id="recipes-list" class="xs:mx-rg lg:mx-0">
                @foreach ($all_recipe as $item)
                    <li
                        class=" block-link cursor-pointer border-gray-400 border-t-0 border-l-0 border-r-0 border-b flex lg:flex-row-reverse m-0 rounded-none overflow-hidden xs:border-b-none xs:mb-sm xs:rounded-lg hover:bg-gray-200 print:bg-white">
                        <div class="flex-auto m-rg">
                            <div class="flex flex-col h-full justify-between">
                                <div class="flex justify-between">
                                    <div class="flex gap-sm w-full">
                                        <h2
                                            class="mt-0 text-12 leading-tight tracking-tight font-semibold  break-words xs:text-18 lg:text-20">
                                            <a href="{{ route('client.detail', [$item->id, $item->title]) }}"
                                                class="block-link__main no-underline text-red-500">
                                                {{ $item->title }}
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                                <div class="flex justify-between">
                                    <div class="flex gap-sm w-full">
                                        <span
                                            class="mt-0 text-12 leading-tight tracking-tight break-words xs:text-18 lg:text-20 sm:clamp-1">
                                            <span class="">
                                                {{ $item->description }}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center">
                                        <span class="break-all clamp-1">
                                            Viết bởi:
                                            <span class="text-gray-600 text-12 md:text-14 ">
                                                {{ $item->user->name }}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex-none w-20 xs:w-auto h-auto">
                            <img alt=" {{ $item->title }}" loading="eager" fetchpriority="high" class="h-full object-cover"
                                blank_class="object-cover w-[130px] aspect-[13/16]" width="130" height="160"
                                src="{{ asset($item->image) }}">
                        </div>
                    </li>
                @endforeach
                {{ $all_recipe->links() }}
            </ul>
        </div>
    </div>
@endsection
