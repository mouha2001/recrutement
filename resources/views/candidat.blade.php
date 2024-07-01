<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: white;
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .nav-container {
            background-color: #fff;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
            padding: 0 20px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 20;
        }
        .nav-container a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }
        .nav-container a:hover {
            color: #3b82f6;
        }
        .main-content {
            margin-top: 100px;
            padding: 20px;
        }
        .table-container {
            width: 100%;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }
        .table-container table {
            width: 100%;
            border-collapse: collapse;
            font-size: 18px;
        }
        .table-container th, .table-container td {
            padding: 20px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        .table-container th {
            background-color: #3b82f6;
            color: white;
            text-transform: uppercase;
            font-size: 16px;
        }
        .table-container td {
            background-color: #ffffff;
        }
        .table-container tr:nth-child(even) {
            background-color: #f9fafb;
        }
        .table-container .action-buttons a {
            display: inline-block;
            padding: 12px 25px;
            margin: 5px 0;
            background-color: #3b82f6;
            color: white;
            text-align: center;
            border-radius: 5px;
            transition: background-color 0.3s;
            text-decoration: none;
        }
        .table-container .action-buttons a:hover {
            background-color: #2563eb;
        }
        .content-container {
            padding: 40px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1400px;
            margin: 40px auto;
        }
        .content-container h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        .text-center {
            text-align: center;
        }
        .btn-primary {
            background-color: #3b82f6;
            color: white;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-primary:hover {
            background-color: #2563eb;
        }
        .no-posts {
            font-size: 18px;
            color: #6b7280;
        }
        .table-container th, .table-container td {
            border-right: 1px solid #e2e8f0;
        }
        .table-container th:last-child, .table-container td:last-child {
            border-right: none;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100">

    <nav class="nav-container">
        <a class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/nouveau-logo-uadb.png') }}" alt="Logo UADB" width="300" height="auto">
        </a>

        <ul class="flex items-center h-20 space-x-3">
            <a href="/">Accueil</a>
            <li class="relative group">
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg :bg-gray-100 group">
                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="gray" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">{{ Auth::user()->nom }}</span>
                </a>
                <div class="absolute right-0 hidden w-48 py-2 mt-2 bg-white rounded-lg shadow-xl group-hover:block">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Modifier Profil</a>
                    <form method="POST" action="{{ route('logout') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                        @csrf
                        <button type="submit">Déconnecter</button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    <div class="main-content">
        <div class="content-container">
            <h1 class="text-4xl uppercase"><strong>Recrutement des personnels Enseignants</strong></h1>

            @if ($postuler->isEmpty())
                <div class="text-center text-gray-500 no-posts">
                    <p>Aucun poste disponible pour le moment.</p>
                </div>
            @else
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Intituler</th>
                                <th>Departement</th>
                                <th>Date limite</th>
                                <th>Heure limite</th>
                                <th>Type de contrat</th>
                                <th>Postes</th>
                                <th>Postuler de recrutement</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($postuler as $postuler)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $postuler->intituler }}</td>
                                <td>{{ $postuler->departements }}</td>
                                <td>{{ $postuler->datelimite }}</td>
                                <td>{{ $postuler->heurelimite }}</td>
                                <td>{{ $postuler->contrat }}</td>
                                <td>{{ $postuler->postes }}</td>
                                <td>
                                    <a href="{{ asset('storage/' . $postuler->fichier) }}" class="hover:text-blue-700">Lire le fichier</a>
                                </td>
                                <td class="action-buttons">
                                    @if ($postuler->postes == 'per')
                                        <a href="{{ route('postulerper') }}?id={{ $postuler->id }}" class="btn-primary">Postuler</a>
                                    @endif
                                    @if ($postuler->postes == 'pats')
                                        <a href="{{ route('postulerpats3') }}?id={{ $postuler->id }}" class="btn-primary">Postuler</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>
</html>
