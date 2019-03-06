@extends('dashboard.master')

@section('title', 'Home')

@section('content-header', 'Control panel')


@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box">
            <div class="box-header">Dashboard</div>

            <div class="box-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in!
            </div>
        </div>
    </div>
</div>
@endsection
