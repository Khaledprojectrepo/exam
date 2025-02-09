<x-guest-layout>
   <div>
              <h1 class="w-full block text-black font-bold text-bold text-center text-3xl"> Login  </h1>
   </div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
<div class="inline-flex justify-start mt-4">
    <label class="bg-blue-500 text-white  m-4 rounded">
        <input type="radio" name="role" value="admin" class="hidden peer" checked />
        <div class="text-white  p-2 rounded">Admin</div>
    </label>

    <label class="bg-teal-500 text-white m-4 rounded">
        <input type="radio" name="role" value="merchant" class="hidden peer" />
        <div class=" text-white  p-2 ">Merchant</div>
    </label>

    <x-input-error :messages="$errors->get('role')" class="mt-2" />
</div>
<div class="inline-flex justify-center mt-4  w-full">
            <x-primary-button class="ms-3 block bg-red-500 text-white rounded">
                {{ __('Log in') }}
            </x-primary-button>
</div>
        </div>
    </form>
</x-guest-layout>
