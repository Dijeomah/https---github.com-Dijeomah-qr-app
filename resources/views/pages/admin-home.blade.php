@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <p>Welcome to the Admin dashboard.</p>
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Creator</th>
                        <th scope="col">Qr Name</th>
                        <th scope="col">Qr Link</th>
                        <th scope="col">Qr Code</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($qr_codes as $qr_code)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        {{-- <td>{!! $qr_code->user_id !!}</td> --}}
                        <td>
                            @foreach ($users as $user)
                                @if ($qr_code->user_id == $user->id)
                                {!! $user->name !!}
                                @endif
                            @endforeach
                            
                        </td>
                        <td>{!! $qr_code->qr_name !!}</td>
                        <td><a href="https://{!! $qr_code->qr_link !!}">{{ $qr_code->qr_link }}</a></td>
                        <td width="10%">{!! $qr_code->qr_code !!}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-success">View</a>
                            <a href="#" class="btn btn-sm btn-outline-info">Edit</a>
                            <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection