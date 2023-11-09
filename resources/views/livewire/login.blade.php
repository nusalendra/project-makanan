<div>
  @if($registerForm)
  <div class="d-lg-flex half">
    
    <div class="bg order-1 order-md-2" style="background-image: url('asset/images/outlet.jpeg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
          <h3 class="text-center"><strong> Selamat Datang </strong></h3>
          <h3 class="text-center"><strong> Silahkan Register User</strong></h3>
            <p class="mb-4 text-center"><strong></strong></p>
              <div class="form-group first">
                <label for="username" style="color: #ffff;">Username</label>
                <input type="text" wire:model="username" class="form-control @error('email') is-invalid @enderror">
              </div>
              <div class="form-group last mb-3">
                <label for="username" style="color: #ffff;">Email</label>
                <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror">
              </div>
              <div class="form-group last mb-3">
                <label for="username" style="color: #ffff;">Name</label>
                <input type="text" wire:model="name" class="form-control @error('email') is-invalid @enderror">
              </div>
              <div class="form-group last mb-3">
                <label for="password" style="color: #ffff;">Password</label>
                <input type="password" wire:model="password" class="form-control" placeholder="Masukkan Password" id="password">
              </div>
             
                <button wire:click.prevent="registerStore" class="btn btn-primary btn-block">Register</button>
              <br>
              <a type="button" class="btn btn-primary btn-block" wire:click.prevent="register" href="">Back</a>
              <hr width="100%" noshade size="25%" style="color:#BB0A1E">
              <!-- <a href="#" class="btn btn-danger btn-block"><i class="fa fa-google"></i> Sign in with <b>Google</b></a> -->
               <!-- tambahkan script di bawah ini untuk membuat tombol signin google -->
                
          </div>
        </div>
      </div>
    </div>
  </div>
  @else
<div class="d-lg-flex half">
    
    <div class="bg order-1 order-md-2" style="background-image: url('asset/images/outlet.jpeg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
          <h3 class="text-center"><strong> Selamat Datang </strong></h3>
          <h3 class="text-center"><strong> Silahkan Login User</strong></h3>
            <p class="mb-4 text-center"><strong></strong></p>
            <form>
              @csrf
              <div class="form-group first">
                <label for="username" style="color: #ffff;">Username</label>
                <input type="text" class="form-control" wire:model="username"  id="email" placeholder="Masukkan Username" id="username">
              </div>
              <div class="form-group last mb-3">
                <label for="password" style="color: #ffff;">Password</label>
                <input type="password" class="form-control" placeholder="Masukkan Password" id="password" wire:model="password">
              </div>
              <!-- <a href="/homepage"><button type="submit"class="btn btn-primary btn-block">Log In</button></a> -->
              <button wire:click.prevent="LoginStore" class="btn btn-success btn-block">Log In</button>
              <br>
              <!-- raiso len -->
          </form>
              <a type="button" class="btn btn-primary btn-block" wire:click.prevent="register" href="">Register</a>
              <hr width="100%" noshade size="25%" style="color:#BB0A1E">
              <!-- <a href="#" class="btn btn-danger btn-block"><i class="fa fa-google"></i> Sign in with <b>Google</b></a> -->
               <!-- tambahkan script di bawah ini untuk membuat tombol signin google -->
                
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>

