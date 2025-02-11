@extends('auth.layouts.app')

@section('title', 'Login')

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
    <!-- Success Message -->
    @if(session('error'))
    <div id="alert-message" class="flex items-start max-sm:flex-col bg-red-100 text-red-800 p-4 rounded-lg relative" role="alert">
        <div class="flex items-center max-sm:mb-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] fill-red-500 inline mr-3" viewBox="0 0 32 32">
            <path
              d="M16 1a15 15 0 1 0 15 15A15 15 0 0 0 16 1zm6.36 20L21 22.36l-5-4.95-4.95 4.95L9.64 21l4.95-5-4.95-4.95 1.41-1.41L16 14.59l5-4.95 1.41 1.41-5 4.95z"
              data-original="#ea2d3f" />
          </svg>
          <strong class="font-bold text-sm">Error!</strong>
        </div>

        <span class="block sm:inline text-sm ml-4 mr-8 max-sm:ml-0 max-sm:mt-2">{{ session('error') }}</span>
    </div>
    @endif

    <h2 class="text-2xl font-bold text-gray-800 mb-6">Sign in</h2>

    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="email">Email</label>
            <input type="email" name="email" id="email" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') is-invalid @enderror">
            @error('email')
                <span class="text-red-800 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="password">Password</label>
            <input type="password" name="password" id="password" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') is-invalid @enderror">
            @error('password')
                <span class="text-red-800 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-between items-center">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                Sign in
            </button>

            <a href="{{ route('register') }}" class="text-gray-800">Don't have an account? <span class="font-semibold hover:text-blue-500 hover:underline">Register</span></a>
        </div>
    </form>
</div>

<script>
    // Check if the success message is present
    window.onload = function() {
        const successMessage = document.getElementById('alert-message');
        
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.opacity = 0;
                successMessage.style.transition = 'opacity 1s';
                setTimeout(() => successMessage.style.display = 'none', 1000);
            }, 3000); // 3 seconds timeout
        }
    };
</script>
@endsection