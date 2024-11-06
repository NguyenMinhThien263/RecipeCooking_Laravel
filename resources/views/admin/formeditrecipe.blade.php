@extends('admin.dashboard')
@section('data')
    <form method="POST" action="{{ route('recipe.edit', $recipe->id) }}">
        @csrf
        @method('PUT')
        <div>

            <div class="mt-8 border-t border-gray-200 pt-8">

                <div class="">
                    <div class="sm:col-span-3">
                        <label for="" class="block text-sm font-medium leading-5 text-gray-700">
                            Title
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="" name="title"
                                class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                style="min-width: 100%" value="{{ $recipe->title }}" />
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="" class="block text-sm font-medium leading-5 text-gray-700">
                            Description
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <textarea id="" name="title"
                                class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" cols=""
                                rows="8" style="min-width: 100%" value="{{ $recipe->description }}"></textarea>
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="content" class="block text-sm font-medium leading-5 text-gray-700">
                            Content
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            {{-- @trix(\App\Recipe::class, 'content') --}}
                            @trix($recipe, 'content')
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="mt-8 border-t border-gray-200 pt-5">
            <div class="flex justify-end">
                <span class="inline-flex rounded-md shadow-sm">
                    <button type="button"
                        class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                        Cancel
                    </button>
                </span>
                <span class="ml-3 inline-flex rounded-md shadow-sm">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                        Save
                    </button>
                </span>
            </div>
        </div>
    </form>
@endsection
