
<x-layout>
    @section('search')
    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" name="search" method="get" action="{{ route('produk.index') }}">
      <input type="search" class="form-control" placeholder="Search..." aria-label="Search" name="search" style="width: 300px">
    </form>
    @endsection
    <div class="mt-5">
      @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
                <th scope="col" class="text-center">Gambar Produk</th>
                <th scope="col" class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>BRG {{ $item->id }}</td>
                <td>{{ $item->nama }}</td>
                <td>Rp {{ number_format($item->harga) }}</td>
                <td>{{ number_format($item->stok) }}</td>
                <td class="text-center"><img src="img/{{ $item->gambar }}" alt="Gambar Produk" style="width: 70px; height: 70px; object-fit: cover; object-position: center"></td> 
                <td class="text-center">
                    <a href="{{ route('produk.edit', ['id' => $item->id]) }}" class="btn btn-warning mb-2" style="font-size: 15px">Edit</a>
                    <form action="{{ route('produk.delete', ['id' => $item->id]) }}" method="post">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger" style="font-size: 15px">Delete</button>
                    </form>
                </td>
              </tr>
              @endforeach
              
            </tbody>
            
          </table>
          {{ $data->links() }}
    </div>
</x-layout>
