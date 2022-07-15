<x-app-admin title="About">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Makanan</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Food Control</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i> Data Rakomendasi Menggunakan SAW
                    </div>
                    <div class="card-body">
                        {{-- <form action="{{ route('food.store') }}" style="margin-bottom: 20px" method="post">
                            @csrf --}}
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input value="{{ $max1 }}" name="name" class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" autocomplete="off" />
                                        <label for="inputFirstName">Rank 1</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input value="{{ $max1 }}" name="name" class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" autocomplete="off" />
                                        <label for="inputFirstName">Rank 2</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input value="{{ $max1 }}" name="name" class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" autocomplete="off" />
                                        <label for="inputFirstName">Rank 3</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input value="{{ $max1 }}" name="name" class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" autocomplete="off" />
                                        <label for="inputFirstName">Rank 4</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input value="{{ $max1 }}" name="name" class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" autocomplete="off" />
                                        <label for="inputFirstName">Rank 5</label>
                                    </div>
                                </div>
                            </div>
                        {{-- </form> --}}
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i> Data Makanan
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Calorie</th>
                                    <th>Karbohidrat</th>
                                    <th>Lemak</th>
                                    <th>Protein</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Calorie</th>
                                    <th>Karbohidrat</th>
                                    <th>Lemak</th>
                                    <th>Protein</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($foods as $index => $food)
                                    <tr>
                                        <td>{{ $food->name }}</td>
                                        <td>{{ $food->calorie }}</td>
                                        <td>{{ $food->carb }}</td>
                                        <td>{{ $food->fat }}</td>
                                        <td>{{ $food->protein }}</td>
                                        <td class="d-flex"><a class="btn btn-primary me-2"href="{{ route('food.edit',$food->id) }}">Edit</a>
                                            <form action="{{ route('food.destroy',$food->id) }}" method="POST">
                                                @csrf
                                                @method("delete")
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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