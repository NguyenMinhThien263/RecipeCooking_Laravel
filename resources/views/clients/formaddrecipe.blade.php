@extends('clients.index')
{{-- @section('title-content', 'Add recipe') --}}
@section('content_data')
    <form method="POST" action="{{ route('client.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mt-8 border-t border-gray-200 pt-8">
            <div class="">
                <input id="" name="user_id" value="{{ $user_id }}" hidden />
                <div class="sm:col-span-3">
                    <label for="" class="block text-sm font-medium leading-5 text-gray-700">
                        Title
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="" name="title"
                            class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                            style="min-width: 100%" />
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="" class="block text-sm font-medium leading-5 text-gray-700">
                        Banner Image
                    </label>
                    <div class="d-flex flex-row justify-content-start align-items-center">
                        <div class="img_file w-15 px-2">
                            <img id="img_preview" class="img-fluid" src="" accept="image/*" alt="">
                        </div>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input type="file" id="image_file" name="image_file"
                                class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                style="min-width: 100%" />
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="" class="block text-sm font-medium leading-5 text-gray-700">
                        Description
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <textarea id="" name="description"
                            class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" cols=""
                            rows="8" style="min-width: 100%"></textarea>
                    </div>
                </div>
                <div class="sm:col-span-4">
                    <label for="content" class="block text-sm font-medium leading-5 text-gray-700">
                        Content
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <textarea id="summernote" name="content_recipe">
                                        </textarea>
                    </div>
                </div>

            </div>
        </div>
        <div class="mt-8 border-t border-gray-200 pt-5">
            <div class="flex justify-end">
                <span class="inline-flex rounded-md shadow-sm">
                    @include('component.cancelbutton')
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
