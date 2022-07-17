<x-app-admin title="About">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Menu</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Food Menu Item</li>
                </ol>
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Calorie</th>
                        <th>Karbohidrat</th>
                        <th>Lemak</th>
                        <th>Protein</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $no= 1 ;?>
                        @if ($trec != 0)
                            @for ($i=0 ; $i<count($foods) ; $i++ )
                                <tr>
                                <td>{{ $no }}</td>
                                    <?php $no++;?>
                                    <td><?php echo $foods[$i]['name']; ?></td>
                                    <td><?php echo $foods[$i]['calorie']; ?></td>
                                    <td><?php echo $foods[$i]['carb']; ?></td>
                                    <td><?php echo $foods[$i]['fat']; ?></td>
                                    <td><?php echo $foods[$i]['protein']; ?></td>
                                </tr>
                                    
                            @endfor
                        @endif
                    </tbody>
                </table>
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