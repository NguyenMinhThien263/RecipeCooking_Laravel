    <form method="POST" action="{{ route('recipe.store') }}">
        @csrf
        @trix(\App\Recipe::class, 'content')
        <input type="submit">
    </form>
