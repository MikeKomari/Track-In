@extends("layout.auth-layout")

@section('title', 'Register - Track-In')

@section("content")

  
    <div class="flex justify-between flex-col">
      <div class="justify-between flex items-center">
        <div class="flex items-center gap-2">
          <img src="{{asset("images/logoTrackIn.png")}}" alt="">
          <h1 class="text-xl">Track-In</h1>
        </div>

        <x-language-switcher/>
      </div>

      <form method="POST" action="{{route('create.user')}}" class="flex flex-col px-20 justify-center max-md:px-0 max-md:w-full">
        @csrf
        <p class="text-3xl font-bold">Daftar Akun</p>
        <p class="my-3 text-secondary">Daftar Track-In untuk melihat daftar produk dan transaksi anda. Tinggal di Track-In aja!</p>

        <x-input
            label="Full Name"
            placeholder="Elysia Bellamy"
            class="mt-1 w-full"
            name="fullName"
            :value="old('fullName')"
            :error="$errors->first('fullName')"
        />
        <x-input
            label="Email"
            placeholder="elysiabellamy@gmail.com"
            class="mt-1 w-full"
            name="email"
            :value="old('email')"
            :error="$errors->first('email')"
        />
        <x-input
            label="Password"
            placeholder="********"
            class="mt-1 w-full"
            name="pass"
            :value="old('pass')"
            :error="$errors->first('pass')"
            type="password"
        />
        
        <div class="flex items-center gap-2 my-4">
          <input type="checkbox" class="w-6 h-6 rounded-lg bg-input-background" name="rememberMe" id="rememberMe">
          <label for="rememberMe">Ingat Saya</label>
        </div>

        <button type="submit" class="bg-accent w-full rounded-xl text-white py-4 animate-cta">Daftar</button>
      
      
        <p class="text-secondary my-8 text-center">Sudah memiliki akun? <a href="/login"><span class="text-accent underline">Masuk</span></a></p>
      </form>

      <p class="text-center text-tertiary">© Copyright Track-In 2025. All Rights Reserved</p>
    </div>

    <div class="w-full flex justify-center items-center max-md:hidden">

      <img class="max-h-full bg-cover" src="{{asset("images/authIllust.png")}}" alt="">
    </div>
  

@endsection
