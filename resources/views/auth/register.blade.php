<x-app-auth>
    <!-- Outer Row -->
    <div class="wrapper">
        <div class="logo">
            <a href="/">
                <img class="img-fluid" src="img/icon-deal.png" alt="Icon"">
            </a>
        </div>
        
        <div class="row">
            <div class="text-center col-lg-12 mt-4 name">
                SehatYokk - login
            </div>
        </div>
        <form class="p-3 mt-3" method="POST" action="" autocomplete="off">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="username" id="userName" placeholder="Username">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            <button class="btn mt-3">Login</button>
        </form>
        <div class="text-center mt-lg-1 ">
            Sudah Punya Akun?<a href="{{ route('masuk') }}">Login</a>
        </div>
    </div>
</x-app-auth>