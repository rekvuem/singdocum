@extends('auth.layouts.app')

@section('content_login')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Перевірте свою адресу електронної пошти') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('На вашу електронну адресу надіслано свіже посилання для підтвердження.') }}
                        </div>
                    @endif

                    {{ __('Перш ніж продовжувати, будь ласка, перевірте свою електронну адресу для підтвердження посилання.') }}
                    {{ __('Якщо ви не отримали повідомлення електронної пошти') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('натисніть тут, щоб надіслати запит повторно') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
