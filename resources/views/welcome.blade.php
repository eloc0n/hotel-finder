@extends('layouts.layout')

@section('content')

<div class="card">
    <div class="card-header">Welcome Page</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <p><a href="/room">Go to Search Page</a></p>
    </div>
</div>
@endsection