<x-app-layout title="Profil">
    {{-- <x-recomendation-header></x-recomendation-header> --}}
    <!-- Category Start -->
    <div class="container-xxl py-3">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Kalkulator Sehat</h1>
                <p>Hitung segala kebutuhan asupan tubuh dengan kalkulasi yang tepat agar sesuai dengan target aktivitas serta kebutuhan asupan tubuh anda.</p>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                    {{-- <div class="cat-item d-block text-center p-3" href=""> --}}
                    <div class="d-block text-center p-3" href="">
                        <div class="p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid" src="img/icon-apartment.png" alt="Icon">
                            </div>
                            <h4><a href="{{ route('calchealth') }}">Kalkulator</a> Fat</h4>
                            <span>Mengestimasi berapa gram lemak yang perlu anda konsumsi untuk menjaga pola makan sehat.</span>
                            <form class="grid text-center mt-5" style="--bs-rows: 3; --bs-columns: 3;" action="{{ route('fat.store') }}" method="post">
                                @csrf
                                <br>Tingkat Aktivitas Anda <br>
                                <select value='@php if (isset($gender)) { echo $gender;} @endphp'  name="gender" class="g-start-2 mt-2 mb-4 custom-select" style="grid-row: 3; width:150px;" type="text" placeholder="Masukkan berat anda" autocomplete="off">
                                    <option value="1">Laki laki</option>
                                    <option value="2">Perempuan</option>
                                </select><br>
                                Masukkan Umur Anda <br>
                                <input value='@php if (isset($age)) { echo $age;} @endphp' name="age" class="g-start-2 mt-2 mb-4" style="grid-row: 1" id="inputFirstName" type="number" placeholder="Masukkan umur anda" autocomplete="off" /><br>
                                Masukkan Tinggi Anda <br>
                                <input value='@php if (isset($height)) { echo $height;} @endphp' name="height" class="g-start-2 mt-2 mb-4" style="grid-row: 2" type="text" placeholder="Masukkan tinggi anda" autocomplete="off" /><br>
                                Masukkan Berat Anda <br>
                                <input value='@php if (isset($weight)) { echo $weight;} @endphp' name="weight" class="g-start-2 mt-2 mb-4" style="grid-row: 3" type="text" placeholder="Masukkan berat anda" autocomplete="off" /><br> 
                                <br> Jumlah olahraga dalam seminggu <br>
                                <select value='@php if (isset($exercise_activity)) { echo $exercise_activity;} @endphp'  name="exercise_activity" class="g-start-2 mt-2 mb-4 custom-select" style="grid-row: 3; width:150px;" type="text" placeholder="Masukkan berat anda" autocomplete="off">
                                    <option value="1">Sangat Jarang</option>
                                    <option value="2">Jarang(1-2 kali perminggu)</option>
                                    <option value="3">Normal(3-4 kali perminggu)</option>
                                    <option value="4">Sering(4-5 kali perminggu)</option>
                                    <option value="4">Sangat(2 kali sehari)</option>
                                </select><br>
                                <button type="submit" class="btn btn-success mt-3">Hitung</button>
                            </form>
                            <h6>Hasil</h6>
                            <h6>
                                @php
                                if (isset($success)) {
                                    echo $success;
                                }
                                @endphp
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mx-auto mt-5 mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p>NB: kalkulator bersifat perhitungan ilmiah untuk usia diatas 18 tahun serta tidak disertai penyakit bawaan, alergi ataupun alergi.</p>
            </div>
        </div>
    </div>
    <!-- Category End -->
</x-app-layout>