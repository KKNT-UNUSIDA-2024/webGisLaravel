<x-app-layout>
    <div class="content">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- <div class="tools float-right">
                        <div class="dropdown">
                            <button type="button" class="btn btn-default dropdown-toggle btn-link btn-icon"
                                data-toggle="dropdown">
                                <i class="tim-icons icon-settings-gear-63"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <a class="dropdown-item text-danger" href="#">Remove Data</a>
                            </div>
                        </div>
                    </div> --}}
                    <h4 class="card-title">Semua Tempat</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive ps">
                        <table class="table">
                            <thead class="text-primary">
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>
                                        Nama Tempat
                                    </th>
                                    <th>
                                        Kategori
                                    </th>
                                    <th class="text-center">
                                        latitude
                                    </th>
                                    <th class="text-right">
                                        longitude
                                    </th>
                                    <th class="text-right">
                                        Deskripsi
                                    </th>
                                    <th class="text-right">
                                        Foto
                                    </th>
                                    <th class="text-right">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tempats as $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $item->nama_tempat }}
                                        </td>
                                        <td>
                                            {{ $item->kategori->nama_kategori }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->latitude }}
                                        </td>
                                        <td class="text-right">
                                            {{ $item->longitude }}
                                        </td>
                                        <td class="text-right">
                                            {{ $item->deskripsi }}
                                        </td>
                                        <td class="text-right">
                                            <div class="modal fade" id="noticeModal" tabindex="-1" role="dialog"
                                                aria-labelledby="myModalLabel" style="display: none;"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-notice">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">
                                                                <i class="tim-icons icon-simple-remove"></i>
                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <img src="{{ asset('assets/' . $item->foto) }}" alt="Foto Tempat"
                                            class="img-fluid"> --}}
                                            <button class="btn btn-info" data-toggle="modal"
                                                data-target="#{{ str_replace(' ', '',$item->nama_tempat) }}">
                                                gambar
                                            </button>
                                            <div class="modal fade" id="{{ str_replace(' ', '',$item->nama_tempat) }}" tabindex="-1" role="dialog"
                                                aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-notice">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">
                                                                <i class="tim-icons icon-simple-remove"></i>
                                                            </button>
                                                            <h5 class="modal-title" id="myModalLabel">Gambar Tempat</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="{{ asset('assets/' . $item->foto) }}" alt="Foto Tempat"
                                                                class="img-fluid">
                                                        </div>
                                                        <div class="modal-footer justify-content-center">
                                                            <button type="button" class="btn btn-info btn-round"
                                                                data-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <form action="{{ route('edit-data', $item->id) }}" method="GET">
                                                <button type="submit" rel="tooltip"
                                                    class="btn btn-success btn-link btn-sm btn-icon "
                                                    data-original-title="Edit" title="">
                                                    <i class="tim-icons icon-pencil"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('tempats.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" rel="tooltip"
                                                    class="btn btn-danger btn-link btn-sm " data-original-title="Delete"
                                                    title="" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="tim-icons icon-simple-remove"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
