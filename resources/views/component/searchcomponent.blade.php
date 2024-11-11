{{-- @if (Auth::user->isadmin)
    dd($user)
@endif --}}
<form action="{{ route('dashboard') }}" method='GET'
    class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    <div class="input-group">
        <input class="form-control" name="search" type="text" placeholder="Search for..." aria-label="Search for..."
            aria-describedby="btnNavbarSearch" />
        <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
    </div>
</form>
