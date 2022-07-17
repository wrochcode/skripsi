<!-- Header Start -->
<div class="container-fluid header bg-white p-0">
    <div class="row mt-lg-5 g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-5 p-5 mt-lg-5">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif
            <h1 class="display-5 animated fadeIn mb-4">Cari <span class="text-primary">Cara Sehat Terbaik</span> dengan gayamu sendiri</h1>
            <p class="animated fadeIn mb-4 pb-2">Temukan kebiasaan baru untuk hidup sehat, tubuh sehat aktifitas lancar.</p>
            <a href="https://api.whatsapp.com/send?phone=62895326920220&text=Halo,%20saya%20ingin%20member%20gym" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Daftar GYM</a>
        </div>  
        <div class="mt-lg-5 col-md-6 animated fadeIn">
            <div class="owl-carousel header-carousel">
                <div class="owl-carousel-item">
                    <img class="img-fluid" src="img/gym1.jpg" alt="">
                </div>
                <div class="owl-carousel-item">
                    <img class="img-fluid" src="img/gym2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->