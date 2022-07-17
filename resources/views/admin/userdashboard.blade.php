<x-app-admin title="Dashboard">
    <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard Member</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-12 col-md-6">
                            <div class="card bg-info justify-content-md-center text-white mb-4">
                                <div class="card-header text-center">Event on Going</div>
                                <div class="card-body text-center">{{ $value }}</div>
                            </div>
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
    </div>
</x-app-admin>