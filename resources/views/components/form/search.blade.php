<form class="m-0 p-0" action="{{ route( $entity . '.search') }}" method="post">
    @csrf
    <input class="d-inline" type="text" id="search" name="search" placeholder="Suchbegriff" />
    <input type="submit" class="btn-sm btn-primary ml-1 d-inline" value="Search" />
</form>
