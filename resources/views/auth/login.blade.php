@extends('layouts.app')

@section('content')

<div class="container">
    <div class="columns is-multiline">
        <div class="card is-6-desktop is-offset-3-desktop column">
            <header class="card-header">
                <h1 class="card-header-title is-size-4">Login</h1>
            </header>
            <div class="card-content">
                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control has-icons-left">
                            <input class="input" type="email" name="email" value="{{ old('email') }}" required />
                            <span class="icon is-small is-left"><i class="fa fa-envelope"></i></span>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Password</label>
                        <div class="control has-icons-left">
                            <input class="input" type="password" name="password" required />
                            <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <label class="checkbox">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                Remember me
                            </label>
                        </div>
                    </div>

                    <div class="field">
                        <a href="{{ route('password.request') }}">Forgot password?</a><br>
                        <div class="is-pulled-right">
                            <input class="button is-success" type="submit" value="Login" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="is-6-desktop is-offset-3-desktop column">
            <a href="{{ route('register') }}">Create an account</a>
        </div>
    </div>
</div>

@endsection
