<x-guest-layout>
    <div class="px-5 py-5 p-lg-0 bg-surface-secondary h-screen ">
        <div class="d-flex justify-content-center align-items-center h-screen">
            <div
                class="col-lg-5 col-xl-4 p-12 p-xl-20 position-fixed start-0 top-0 h-screen overflow-y-hidden bg-primary d-none d-lg-flex flex-column">
                <!-- Logo -->
                <a class="d-block" href="#">
                    <img src="{{ asset('img/logos/logoWhite.png') }}" class="h-30" alt="...">
                </a>
                <!-- Title -->
                <div class="mt-32 mb-20 text-center">
                    <h1 class="ls-tight font-bolder display-6 text-white mb-5">
                        Transportando y construyendo tus sueños
                    </h1>
                    <p class="text-white">
                        Ponemos a tu disposicion los mejores materiales, maquinaria y logistica de transporte
                    </p>
                </div>
            </div>
            <div
                class="col-11 col-md-9 col-lg-7 offset-lg-4 border-left-lg min-h-lg-screen d-flex flex-column justify-content-center px-lg-20 position-relative">
                <div class="row card">
                    <div class="col-lg-10 col-md-9 col-xl-6 mx-auto ">
                        <div class="mt-10 mt-lg-5 mb-6 d-flex justify-content-center align-items-center d-lg-block ">
                            <img src="{{ asset('img/logos/logoGray.png') }}" class="h-20 imgLogoLogin" alt="...">
                        </div>
                        <div class="mt-10 mt-lg-5 mb-6 d-flex align-items-center text-center d-lg-block ">
                            <h1 class="ls-tight font-bolder h2">
                                {{ __('Bienvenido!') }}
                            </h1>
                        </div>
                        <form method="POST" action="{{ route('authLogin') }}" style="margin-bottom: 20px">
                            @csrf
                            <div class="mb-5">
                                <label class="form-label" for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <label class="form-label" for="password">{{ __('Password') }}</label>
                                    </div>
                                </div>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuérdame') }}
                                    </label>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary w-full">
                                    {{ __('Iniciar Sesion') }}
                                </button>
                            </div>
                        </form>
                        @if (session()->has('error'))
                            <div class="alert alert-warning" style="margin: 20px 0">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
