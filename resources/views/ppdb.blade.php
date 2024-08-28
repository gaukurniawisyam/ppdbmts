<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB - MTs DDI Bowong Cindea</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-900 font-sans antialiased flex items-center justify-center min-h-screen">

    <!-- Card Container -->
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-8l font">Jika anda telah yakin ingin mendaftar, silahkan tekan Nama Madrasah dibawah </h1>
        </div>

        <!-- Main Content -->
            <div class="grid grid-cols-1 gap-4">
                @foreach ($ppdb as $data)
                <a href="{{ url('ppdbdaftar/' . $data->idppdb) }}" class="block bg-gray-100 p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center">
                        <img src="{{ asset('foto/' . $data->fotoppdb) }}" alt="{{ $data->judulppdb }}" class="w-16 h-16 object-cover rounded-full mr-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 hover:text-green-500">{{ $data->judulppdb }}</h3>
                            <div class="text-sm text-gray-500">
                                <i class="far fa-calendar-alt mr-2"></i>{{ tanggal($data->waktu) }}
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>

</body>

</html>
