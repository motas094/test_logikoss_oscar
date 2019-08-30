@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="card">
                    <div class="card-header">Nuevo usuario</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('usuario.actualizarUsuario') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div style="display: none">
                                <input id="id" type="text" name="id" value="{{ $usuario->id }}">
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $usuario->name }}" required autocomplete="name" autofocus>
                                    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuario->email }}" required autocomplete="email">
                                    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="{{ $usuario->password }}" autocomplete="new-password">
                                    @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                </div>
                                @if ($errors->has('password_confirmation')) <p class="help-block">{{ $errors->first('password_confirmation') }}</p> @endif
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de usuario') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $usuario->username }}" required autocomplete="username">
                                    @if ($errors->has('username')) <p class="help-block">{{ $errors->first('username') }}</p> @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                                <div class="col-md-6">
                                    <input id="avatar" type="file" class="@error('avatar') is-invalid @enderror" name="avatar" value="">
                                    @if ($errors->has('avatar')) <p class="help-block">{{ $errors->first('avatar') }}</p> @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
