<x-app-layout title="daftar">
    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="text-start ms-5 mx-auto mb-5 fadeInUp" data-wow-delay="0.1s">
                    <h1 class="mb-3">Akun ku</h1>
                </div>
                <div class="row g-0 gx-5 align-items-end">
                    {{-- <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <h1 class="mb-3">Property Listing</h1>
                            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit diam justo sed rebum.</p>
                        </div>
                    </div> --}}
                    {{-- <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s"> --}}
                    <div class="col-lg-8 text-start ms-4 slideInRight" data-wow-delay="0.1s">
                        <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tab-1">Kebutuhan Anda</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-2">Menu Rekomendasi</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-3">Record Berat Badan</a>
                            </li>
                            <li class="nav-item me-0">
                                <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-3">Pengaturan</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row mt-3 ms-5 col-lg-9">
                        <h4>Kebutuhan Tubuh</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Hasil</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">BMI</th>
                                    <td>Berat anda tergolong <b>{{ $kalkulator['descbmi'] }}</b></td>
                                    <td><b>{{ $kalkulator['bmi'] }} ({{ $kalkulator['descbmi'] }})</b></td>
                                </tr>
                                <tr>
                                    <th scope="row">RMR</th>
                                    <td>Butuh <b>{{ $kalkulator['rmr'] }}</b> Kalori saat istirahat</td>
                                    <td><b>{{ $kalkulator['rmr'] }} Kcal</b></td>
                                </tr>
                                <tr>
                                    <th scope="row">EER</th>
                                    <td>Butuh <b>{{ $kalkulator['eer'] }}</b> kalori saat maintenance </td>
                                    <td><b>{{ $kalkulator['eer'] }} Kcal</b></td>
                                </tr>
                                <tr>
                                    <th scope="row">TDEE</th>
                                    <td><b>{{ $kalkulator['tdee'] }}</b> Kalori yang anda bakar</td>
                                    <td><b>{{ $kalkulator['tdee'] }} Kcal</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-3 ms-5 col-lg-9">
                        <h4>Kebutuhan Nutrisi</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nutrisi</th>
                                    <th scope="col">Kalori (Kcal)</th>
                                    <th scope="col">Takaran g (<small>gram</small>)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Karbohidrat</th>
                                    <td>{{ $kalkulator['carb'] }}</td>
                                    <td>{{ $kalkulator['carbgram'] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Lemak</th>
                                    <td>{{ $kalkulator['fat'] }}</td>
                                    <td>{{ $kalkulator['fatgram'] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Protein</th>
                                    <td>{{ $kalkulator['protein'] }}</td>
                                    <td>{{ $kalkulator['proteingram'] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Serat</th>
                                    <td>-</td>
                                    <td>{{ $kalkulator['serat'] }} gram</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p>Belum punya akun? <a href="/masuk">Daftar disini</a></p>
            </div>
        </div>
    </div>
    <!-- Contact End -->
</x-app-layout>