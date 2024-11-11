@extends('admin.dashboard')
@section('title-content', 'Add recipe')
@section('data')
    <form method="POST" action="{{ route('recipe.store') }}" enctype="multipart/form-data">
        @csrf
        <x-formrecipe user_id={{ $user_id }} />
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
