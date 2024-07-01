<!-- resources/views/info.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-8 px-4 md:px-6">
        <h1 class="text-2xl font-bold">Informations soumises</h1>
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Succès!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <table class="w-full mt-4 border-collapse">
            <thead>
                <tr>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Nom</th>
                    <th class="border p-2">Téléphone</th>
                    <th class="border p-2">Message</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userInfos as $userInfo)
                    <tr>
                        <td class="border p-2">{{ $userInfo->email }}</td>
                        <td class="border p-2">{{ $userInfo->name }}</td>
                        <td class="border p-2">{{ $userInfo->phone }}</td>
                        <td class="border p-2">{{ $userInfo->message }}</td>
                        <td class="border p-2">
                            <a href="{{ route('user.info.show', $userInfo->id) }}" class="text-blue-600">Voir</a>
                            <a href="{{ route('user.info.edit', $userInfo->id) }}" class="text-yellow-600 mx-2">Modifier</a>
                            <form action="{{ route('user.info.destroy', $userInfo->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
