<!-- resources/views/admin/send-notification.blade.php -->
@extends('adminlte::page')

@section('title', 'Send Notification')

@section('content_header')
    <h1>Send Notification</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('notification.send') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="recipient_id">Recipient (User ID):</label>
            <input type="number" name="recipient_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea name="message" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send Notification</button>
    </form>
@stop
