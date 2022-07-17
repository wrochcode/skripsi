<x-app-admin title="Food">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Event</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Food Control</li>
                </ol>
                <div class="card mb-4 col-xl-10">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i> Edit Data Event
                        @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    </div>
                    <div class="card-body">
                        <form action="{{ route('event.update', $data->id)  }}" style="margin-bottom: 20px" method="post">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input value="{{ old('name', $data->name) }}" name="name" class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" autocomplete="off" />
                                        <label for="inputFirstName">Nama</label>
                                    </div>
                                    @error('name')
                                    <div class="text-danger mt-0">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-7">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input value="{{ old('value', $data->value) }}" name="calorie" class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" autocomplete="off" />
                                        <label for="inputFirstName">Isi</label>
                                    </div>
                                    @error('value')
                                    <div class="text-danger mt-0">
                                        {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input value="{{ old('describe', $data->describe) }}" name="carb" class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" autocomplete="off" />
                                            <label for="inputFirstName">Deskripsi</label>
                                        </div>
                                        @error('describe')
                                        <div class="text-danger mt-0">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-1">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <a href="{{ route('event.index') }}" class="btn btn-danger mt-2" type="submit">Batal</a>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <button class="btn btn-primary mt-2 text-white" type="submit">Edit</button>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2021</div>
                    <div>
                        <a href="#">Privacy Policy</a> &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</x-app-admin>