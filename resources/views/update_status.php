<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Status</title>
</head>
<body>
    <form action="{{ route('update_status', $pendaftaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="Berkas Diterima dan Sedang Verifikasi">Berkas Diterima dan Sedang Verifikasi</option>
            <option value="Berkas Ditolak, Terdapat Ketidaksesuaian pada Berkas">Berkas Ditolak, Terdapat Ketidaksesuaian pada Berkas</option>
            <!-- Add more options as needed -->
        </select>
        <button type="submit">Update Status</button>
    </form>
</body>
</html>
