@extends('admin.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">View Message</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $message['subject'] }}</h3>
            </div>
            <div class="card-body">
                <p><strong>From:</strong> {{ $message['sender'] }}</p>
                <p><strong>Date:</strong> {{ $message['date'] }}</p>
                <hr>
                <p>{{ $message['body'] }}</p>
            </div>
        </div>
    </div>
@endsection
