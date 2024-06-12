<div class="modal fade" tabindex="-1" role="dialog" id="delete{{ $row->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dataUser.delete') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div>
                        <p class="text-center">Apakah yakin mau hapus data <strong style="color: red;">{{$row->name}}</strong> ?</p>
                        <input type="hidden" name="id" value="{{$row->id}}">
                    </div>

            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </div>
        </form>
    </div>
</div>