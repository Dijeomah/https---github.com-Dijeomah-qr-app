@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <p>Welcome to the User dashboard.</p>
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Qr Name</th>
                        <th scope="col">Qr Link</th>
                        <th scope="col">Qr Code</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($qr_codes as $qr_code)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{!! $qr_code->qr_name !!}</td>
                        <td><a href="https://{!! $qr_code->qr_link !!}">{{ $qr_code->qr_link }}</a></td>
                        <td width="10%">{!! $qr_code->qr_code !!}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
