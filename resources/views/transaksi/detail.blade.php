<form action="{{ route('transaksi_hapus',$transaksi->id) }}" method="POST"> <a href="/transaksi/{{ $transaksi->id }}/edit" class="btn btn-success">
            <i class="far fa-edit"></i>
        </a>
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus
        </button>
    </form>
