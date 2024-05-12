<x-layout>
    <div class="mt-5">
        @if ($errors->any())
          <div class="alert alert-danger alert-dismissible fade show">
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      @endif
        <h3 class="mb-4">Tambah Produk</h3>
        <form action="{{ route('produk.tambah') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div style="width: 400px" class="mb-3">
                <label for="nama" class="mb-2">Nama Produk</label>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nama" id="nama">
            </div>
            <div style="width: 400px" class="mb-3">
                <label for="harga" class="mb-2">Harga</label>
                <div class="input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default">Rp</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="harga" id="harga">
                </div>
            </div>
            </div>
            <div style="width: 400px" class="mb-3">
                <label for="stok" class="mb-2">Stok Produk</label>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="stok" id="stok">
            </div>
            <div style="width: 400px" class="mb-3">
                <label for="gambar" class="mb-2">Gambar Produk</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="gambar" id="gambar">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</x-layout>