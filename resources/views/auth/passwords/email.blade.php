@extends('layouts.app')

@section('content')
    <div class="row">
        {{-- Show success message --}}
        @if (session('status'))
            <div class="col l6 offset-l3 alerts">
                <alert type="success" message="{{ Session::get('status') }}"></alert>
            </div>
        @endif

        <div class="col l6 offset-l3">

            <div class="card mt50">
                <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                @csrf
                    <div class="card-content">
                        <span class="card-title amber-text">Reset Password</span>

                        {{-- Show any errors --}}
                        @if ($errors->has('email'))
                            <span class="invalid-feedback red-text" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

                        <div class="input-field mt25">
                            <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required>
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn waves-effect waves-light green">
                            Send Reset Link
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


{{-- LARAVEL DEFAULT
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
--}}
@endsection

@section('scripts')
    @parent
    <script>
        var alerts = new Vue({
            el: '.alerts',
        })
    </script>
@endsection
