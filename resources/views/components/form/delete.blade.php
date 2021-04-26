<form class="d-inline m-0 p-0" action="{{ route( $entity . '.destroy', ['id' => $id]) }}" method="post">
    @csrf
    <button type="submit" class="btn btn-link text-danger m-0 p-0 small softdel" role="link" title="Delete"><i class="fas fa-trash"></i></button>
</form>
