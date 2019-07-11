@extends('layouts.app')

@section('content')
<div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">

            <div class="account-bg">
                <div class="card-box mb-0">
                    <div class="text-center m-t-20">
                        <a href="#" class="logo">
                            <i class="zmdi zmdi-group-work icon-c-logo"></i>
                            <span>{{ env('APP_NAME') }}</span>
                        </a>
                    </div>
                    <div class="m-t-10 p-20">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h6 class="text-muted text-uppercase m-b-0 m-t-0">{{ __('Reset Password') }}</h6>
                            </div>
                        </div>
                        <div class="col-md-12">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        </div>
                        <form class="m-t-20" method="POST" action="{{ route('forgot') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus type="email" name="email" placeholder="Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group text-center row m-t-10">
                                <div class="col-12">
                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">{{ __('Send Password Reset Link') }}</button>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- end card-box-->

        </div>
        <!-- end wrapper page -->
@endsection
