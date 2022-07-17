<x-app-admin title="Dashboard">
    <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    {{-- card --}}
                    <div class="row">
                        <div class="col-xl-2 align-self-end">
                            <div class="card bg-info text-white mb-4">
                                <a href="{{  route('foodmenu.create') }}"><div class="card-body text-decoration-none text-white ">Tambah Menu <i class="fa fa-plus" aria-hidden="true"></i></div></a>
                                {{-- <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class=" text-dark small text-dark stretched-link" href="#">Tambah Menu</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php $indexloop = 1 ;
                        ?>
                        @for ($i = 0 ; $i  < $trec; $i++)
                            
                            <div class="col-xl-12 col-md-6">
                                @if ($indexloop == 1)
                                <div class="card bg-primary text-white mb-4">
                                @elseif ($indexloop == 2)    
                                <div class="card bg-success text-white mb-4">
                                @elseif ($indexloop == 3)    
                                <div class="card bg-warning text-white mb-4">
                                @elseif ($indexloop == 4)    
                                <div class="card bg-danger text-white mb-4">
                                @endif
                                        <div class="card-header">Menu @php echo $indexloop @endphp</div>
                                        <div class="card-body">@php echo 
                                                                "Kalori: ".$foods[$i]['calorie']."&nbsp"."&nbsp"."&nbsp"."&nbsp".
                                                                "Karbohidrat: ".$foods[$i]['carb']."&nbsp"."&nbsp"."&nbsp"."&nbsp".
                                                                "Lemat: ".$foods[$i]['fat']."&nbsp"."&nbsp"."&nbsp"."&nbsp".
                                                                "Protein: ".$foods[$i]['protein']
                                                                ; 
                                                                @endphp</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            {{-- <a class="small text-white stretched-link" href="/">View Details</a> --}}
                                            <a class="small text-white" href="{{ route('foodmenu.detail', $foods[$i]['id']) }}">View Details <i class="fas fa-angle-right"></i></a>
                                            <form action="{{ route('foodmenu.destroy', $foods[$i]['id']) }}" method="POST">
                                                @csrf
                                                @method("delete")
                                                <button type="submit" class="btn btn-danger">Hapus <i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                    </div>
                                </div>
                                @php
                                    // echo $indexloop;
                                    $indexloop++;
                                @endphp
                            </div>
                            @endfor
                            
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