@extends('admin.layout')

@section('content')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Kirim Feedback</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Kirim Feedback</li>
            </ol>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Feedback</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('send_feedback') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="idpendaftaran">ID Pendaftaran:</label>
                    <input type="text" class="form-control" id="idpendaftaran" name="idpendaftaran" value="{{ old('idpendaftaran') }}" required>
                </div>
                <div class="form-group">
                    <label for="message">Pesan Feedback:</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required>{{ old('message') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Feedback</button>
            </form>
        </div>
    </div>
</div>
@endsection
