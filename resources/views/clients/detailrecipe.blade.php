@extends('clients.index')
@section('content_data')
    <div class="flex flex-col justify-center items-center">

        <div class="lg:my-rg lg:rounded-lg lg:shadow print:rounded-none print:shadow-none lg:overflow-hidden">
            <div class="relative">
                <div id="recipe_image" class="print:float-left print:w-2/5 image">
                    <a rel="nofollow" data-action="modal#advance" tabindex="-1"
                        href="/vn/recipe/images/92fdea894d52887d?image_region_id=24">
                        <div class="tofu_image">
                            <img alt="Hình của món Đậu gà &amp; nấm đùi gà xào sả ớt." loading="eager" fetchpriority="high"
                                width="540" height="300" src="{{ asset($recipe->image) }}">
                        </div>
                    </a>
                </div>

            </div>

        </div>
        <div
            class="flex flex-col space-y-rg bg-cookpad-white lg:rounded-lg lg:shadow p-rg mb-sm lg:px-0 lg:pt-0 lg:shadow-none lg:pb-md lg:mb-md lg:border-b print:border-none border-cookpad-gray-300 lg:rounded-none py-rg">
            <h1 class="break-words text-cookpad-16 xs:text-cookpad-24 lg:text-cookpad-36 font-semibold leading-tight clear-both"
                dir="auto">
                {{ $recipe->title }}
            </h1>
        </div>
        <div
            class="flex flex-col space-y-rg bg-cookpad-white lg:rounded-lg lg:shadow p-rg mb-sm lg:px-0 lg:pt-0 lg:shadow-none lg:pb-md lg:mb-md lg:border-b print:border-none border-cookpad-gray-300 lg:rounded-none py-rg">
            <h1 class="break-words text-cookpad-16 xs:text-cookpad-24 lg:text-cookpad-36 font-semibold leading-tight clear-both"
                dir="auto">
                {!! $recipe->content !!}
            </h1>
        </div>
    </div>
@endsection
