@extends('admin/layout')
@section('content')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Set Tanggal Ujian Untuk Peserta</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(!$isDateSet)
        <!-- Form to save the exam date -->
        <form action="{{ route('saveTanggalUjian') }}" method="POST">
            @csrf
            <div>
                <label class="mb-2 block font-medium">Tanggal Ujian</label>
                <input type="date" class="form-control w-full border border-gray-300 rounded p-2" name="tanggalujian" required>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Simpan Tanggal Ujian</button>
        </form>
    @else
        <!-- Button to delete the exam date -->
        @php
            setlocale(LC_TIME, 'id_ID');
            \Carbon\Carbon::setLocale('id');
            $formattedDate = \Carbon\Carbon::parse($tanggalujian)->translatedFormat('l, d F Y');
        @endphp
        <p>Tanggal ujian telah disimpan: {{ $formattedDate }}</p>
        <form action="{{ route('deleteTanggalUjian') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-4">Hapus Tanggal Ujian</button>
        </form>
    @endif
</body>
@endsection
