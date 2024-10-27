<!doctype html>
<html lang="en">
<head>
    <title>IlabAfrica Item Requisition System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cover bg-center min-h-screen flex items-center justify-center p-4"
      style="background-image: url('/images/small-business-worker-analyzing-merchandise-logistics.jpg');">

    <div class="w-full max-w-lg bg-white p-8 md:p-12 rounded-xl shadow-xl">
        <!-- Logo inside the form -->
        <div class="flex justify-center mb-8">
            <img src="/images/LOGO_2.png" alt="Logo" class="w-42 h-32 md:w-60 md:h-60 object-contain">
        </div>

        <form method="POST" action="{{ route('login.submit') }}" onsubmit="showLoader()" class="space-y-6">
            @csrf
            <div class="relative z-0 w-full group">
                <input type="email" name="email" id="email"
                       class="block py-3 px-0 w-full text-base md:text-lg text-gray-900 border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required />
                <label for="email"
                       class="absolute text-base md:text-lg text-gray-500 transform scale-75 top-4 origin-[0] -translate-y-6 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Email
                </label>
                @if ($errors->has('email'))
                    <p class="text-red-500 mt-1 text-sm">{{ $errors->first('email') }}</p>
                @endif
            </div>

            <div class="relative z-0 w-full group">
                <input type="password" name="password" id="password"
                       class="block py-3 px-0 w-full text-base md:text-lg text-gray-900 border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required />
                <label for="password"
                       class="absolute text-base md:text-lg text-gray-500 transform scale-75 top-4 origin-[0] -translate-y-6 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Password
                </label>
                @if ($errors->has('password'))
                    <p class="text-red-500 mt-1 text-sm">{{ $errors->first('password') }}</p>
                @endif
                <span toggle="#password"
                      class="fa fa-fw fa-eye field-icon toggle-password cursor-pointer absolute right-3 top-6"
                      id="togglePassword"></span>
            </div>

            <div class="flex items-center justify-between">
                <label class="inline-flex items-center">
                    <input type="checkbox" class="form-checkbox text-blue-600" checked>
                    <span class="ml-2 text-sm md:text-lg text-gray-700">Remember Me</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm md:text-lg text-blue-600 hover:underline">Forgot Password?</a>
                @endif
            </div>

            <button type="submit"
                    class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 md:py-4 rounded-lg focus:outline-none focus:ring-4 focus:ring-orange-300">
                Sign In
                <div class="loader hidden ml-2 inline-block" id="loader"></div>
            </button>

            <p class="text-center mt-6 text-sm md:text-lg text-gray-500">— Or Sign In With —</p>
            <div class="mt-4 flex justify-center">
                <a href="#"
                   class="bg-red-600 text-white py-2 px-4 md:py-3 md:px-6 rounded-lg hover:bg-red-700 text-sm md:text-lg">
                    <span class="fa fa-google mr-2"></span> Google
                </a>
            </div>
        </form>
    </div>

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });

        // Show loader on form submission
        function showLoader() {
            document.getElementById('loader').classList.remove('hidden');
        }
    </script>
</body>
</html>
