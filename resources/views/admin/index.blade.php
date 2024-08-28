@extends('admin/layout')

@section('content')
    <!-- Existing content header and other sections -->

    @if (isset($error))
        <div class="container text-center py-5">
            <h3>{{ $error }}</h3>
        </div>
    @elseif (isset($data))
        <!-- Existing buttons and card header -->

        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="data-pendaftar-tab" data-toggle="tab" href="#data-pendaftar" role="tab" aria-controls="data-pendaftar" aria-selected="true">Data Pendaftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="send-notification-tab" data-toggle="tab" href="#send-notification" role="tab" aria-controls="send-notification" aria-selected="false">Kirim Notifikasi</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <!-- Data Pendaftar Tab -->
                    <div class="tab-pane fade show active" id="data-pendaftar" role="tabpanel" aria-labelledby="data-pendaftar-tab">
                        <!-- Existing content for Data Pendaftar -->
                    </div>

                    <!-- Send Notification Tab -->
                    <div class="tab-pane fade" id="send-notification" role="tabpanel" aria-labelledby="send-notification-tab">
                        <h5>Kirim Notifikasi</h5>
                        <form method="POST" action="{{ route('admin.sendNotification') }}">
                            @csrf
                            <div class="form-group">
                                <label for="notificationTitle">Judul Notifikasi</label>
                                <input type="text" class="form-control" id="notificationTitle" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="notificationMessage">Pesan</label>
                                <textarea class="form-control" id="notificationMessage" name="message" rows="4" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="participantSelect">Pilih Peserta</label>
                                <select class="form-control" id="participantSelect" name="participants[]" multiple required>
                                    @foreach ($participants as $participant)
                                        <option value="{{ $participant->id }}">{{ $participant->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Existing modal and other content -->
    @endif
@endsection
