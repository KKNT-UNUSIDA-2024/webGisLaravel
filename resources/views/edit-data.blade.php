<x-app-layout>
    <form id="RegisterValidation" novalidate="novalidate" method="POST" action="{{ route('edit-data', $tempats->id) }}"
        enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Tempat</h4>
            </div>
            <div class="card-body">
                <div class="form-group has-label">
                    <label>
                        Nama *
                    </label>
                    <input class="form-control" name="nama_tempat" type="text" value="{{ old('nama_tempat') }}" required aria-invalid="true">
                </div>
                <div class="form-group has-label">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="latitude">Latitude *</label>
                            <input type="text" name="latitude" id="latitude" class="form-control" value="{{ old('latitude') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="longitude">Longitude *</label>
                            <input type="text" name="longitude" id="longitude" class="form-control" value="{{ old('longitude') }}">
                        </div>
                    </div>
                </div>
                <div class="form-group has-label">
                    <label>
                        Kategori *
                    </label>
                    <div class="form-group">
                        <div>
                            <select class="selectpicker" data-size="{{ sizeof($kategori) }}" id="Kategori_id"
                                name="Kategori_id" data-style="btn btn-primary" title="PILIH">
                                <option disabled selected>Pilih</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group has-label">
                    <label>
                        deskripsi
                    </label>
                    <input class="form-control" name="deskripsi" type="text" value="{{ old('deskripsi') }}" required aria-invalid="true">
                </div>
                <div class="category form-category">Foto</div>
                <div class="form-group has-label text-center">
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                            <img src="{{ asset('assets/img/image_placeholder.jpg') }}" alt="splace upload">
                        </div>
                        <div class="fileinput-preview"></div>
                        <div>
                            <span class="btn btn-rose btn-round btn-file">
                                <span class="fileinput-new">Select image</span>
                                <input type="file" name="foto">
                            </span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary">Tambah Tempat</button>
            </div>
        </div>
    </form>
</x-app-layout>
