@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif
        <form action="{{ route('qr.create') }}" method="post">
            @csrf
            @guest
            <div class="col-md-6">
                <div class="form-group m-3">
                    <label for="">Link</label>
                    <input type="text" class="form-control" name="qr_link" id="qr_link">
                    <button type="submit" class="mt-3 btn btn-secondary rounded">Generate</button>
                </div>
            </div>
            @endguest
            @auth

            <div class="col-md-6">
                <div class="form-group m-3">
                    <label for="">Link Name</label>
                    <input type="text" class="form-control" name="qr_name" id="qr_name">
                </div>
                <div class="form-group m-3">
                    <label for="">Link</label>
                    <input type="text" class="form-control" name="qr_link" id="qr_link">
                </div>
                <button type="submit" class="mt-3 btn btn-secondary rounded">Generate</button>
            </div>
            @endauth
        </form>



    </div>
</div>
@endsection