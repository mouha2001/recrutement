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
            width: 100%;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Figtree', sans-serif;
            background-color: #f3f4f6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .form-section {
            display: none;
            width: 100%;
            padding: 2rem;
            background-color: #ffffff;
            border-radius: 0.5rem;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1), 0 6px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }

        .form-section.active {
            display: block;
        }

        .tab-button {
            background-color: #e5e7eb;
            color: #1f2937;
            padding: 0.75rem 2rem;
            cursor: pointer;
            font-weight: 600;
            text-align: center;
            border-radius: 0.375rem;
            transition: background-color 0.3s, color 0.3s;
            flex: 1;
            margin-right: 0.5rem;
        }

        .tab-button:last-child {
            margin-right: 0;
        }

        .tab-button.active {
            background-color: #3b82f6;
            color: #ffffff;
        }

        .section-header {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 1.5rem;
        }

        .input-field {
            background-color: #f9fafb;
            border: 1px solid #d1d5db;
            color: #1f2937;
            padding: 0.75rem 1rem;
            border-radius: 0.375rem;
            width: 100%;
            transition: border-color 0.3s;
        }

        .input-field:focus {
            background-color: #ffffff;
            border-color: #3b82f6;
            outline: none;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #6b7280;
            margin-bottom: 0.5rem;
        }

        .form-button {
            background-color: #3b82f6;
            color: #ffffff;
            padding: 0.75rem 2rem;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: background-color 0.3s;
            border: none;
        }

        .form-button:hover {
            background-color: #2563eb;
        }

        .nav-container {
            width: 100%;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        nav {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-logo img {
            width: 150px;
        }

        .nav-profile {
            display: flex;
            align-items: center;
            position: relative;
        }

        .nav-profile svg {
            margin-right: 0.5rem;
        }

        .nav-profile:hover .profile-menu {
            display: block;
        }

        .profile-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background-color: #ffffff;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            z-index: 10;
        }

        .profile-menu a,
        .profile-menu button {
            display: block;
            padding: 0.75rem 1.5rem;
            color: #1f2937;
            text-align: left;
            text-decoration: none;
            transition: background-color 0.3s;
            width: 100%;
            border: none;
            background: none;
            cursor: pointer;
        }

        .profile-menu a:hover,
        .profile-menu button:hover {
            background-color: #f3f4f6;
        }

        .flex-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        hr {
            border: none;
            border-top: 4px solid #d1d5db;
            margin: 2rem 0;
        }

        .footer {
            width: 100%;
            background-color: #ffffff;
            padding: 1rem;
            text-align: center;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            bottom: 0;
            left: 0;
        }

        .footer p {
            margin: 0;
            font-size: 0.875rem;
            color: #6b7280;
        }

        .error-message {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }

        .center-logo {
            display: flex;
            justify-content: center;
            margin: 0.5rem 0;
        }

        .center-logo img {
            width: 300px;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("chargement").style.display = "none";
            showSection('experience');
        });

        function showSection(sectionId) {
            const sections = document.querySelectorAll('.form-section');
            sections.forEach(section => section.classList.remove('active'));
            document.getElementById(sectionId).classList.add('active');

            const tabButtons = document.querySelectorAll('.tab-button');
            tabButtons.forEach(button => button.classList.remove('active'));
            document.getElementById('tab-' + sectionId).classList.add('active');
        }

        function addDiplome() {
            const diplomeContainer = document.getElementById('diplome-container');
            const diplomeIndex = diplomeContainer.children.length;

            const newDiplome = document.createElement('div');
            newDiplome.classList.add('mb-6');
            newDiplome.innerHTML =
                `<div class="mb-6">
                    <label for="nomdiplome_${diplomeIndex}" class="form-label">Nom du diplôme</label>
                    <select id="nomdiplome_${diplomeIndex}" name="nomdiplome[]" class="input-field" required>
                        <option value="">Sélectionner un diplôme</option>
                        <option value="Doctoratdetat">Doctorat d'état</option>
                        <option value="Doctoratunique">Doctorat Unique</option>
                        <option value="phd">PhD</option>
                        <option value="doctoratcycle3">Doctorat 3ème cycle</option>
                        <option value="masterII">Master II</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="fichediplome_${diplomeIndex}" class="form-label">Attestation</label>
                    <input type="file" name="fichediplome[]" id="fichediplome_${diplomeIndex}" class="input-field" accept="application/pdf" required>
                </div>`;
            diplomeContainer.appendChild(newDiplome);
        }

        function handleSubmit(event) {
            event.preventDefault();
            const isValid = validateSections();
            if (isValid) {
                alert('Votre dossier a été bien reçu.');
                event.target.submit();
            } else {
                const firstInvalidSection = document.querySelector('.form-section.invalid');
                if (firstInvalidSection) {
                    const sectionId = firstInvalidSection.getAttribute('id');
                    showSection(sectionId);
                    alert('Veuillez remplir tous les champs dans la section ' + sectionId + ' avant de soumettre.');
                }
            }
        }

        function validateSections() {
            let isValid = true;
            const sections = document.querySelectorAll('.form-section');
            sections.forEach(section => {
                const inputs = section.querySelectorAll('input, select');
                let sectionValid = true;
                inputs.forEach(input => {
                    if (!input.value) {
                        sectionValid = false;
                    }
                });
                if (!sectionValid) {
                    section.classList.add('invalid');
                    isValid = false;
                } else {
                    section.classList.remove('invalid');
                }
            });
            return isValid;
        }
    </script>
</head>
<body>
    <div class="nav-container">
        <nav>
            <div class="nav-logo">
                <img src="{{ asset('images/nouveau-logo-uadb.png') }}" alt="Logo UADB">
            </div>
            <div class="nav-profile">
                <a href="#" class="flex items-center">
                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="gray" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <span class="ml-2">{{ Auth::user()->nom }}</span>
                </a>
                <div class="profile-menu">
                    <a href="{{ route('profile.edit') }}">Modifier Profil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Déconnecter</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
    <br>

    <div class="center-logo">
        <img src="{{ asset('img/logo.png') }}" alt="Logo">
    </div>

    <div class="container">
        <div class="flex-row">
            <button id="tab-experience" class="tab-button active" onclick="showSection('experience')">Expérience</button>
            <button id="tab-niveau" class="tab-button" onclick="showSection('niveau')">Niveau</button>
            <button id="tab-diplome" class="tab-button" onclick="showSection('diplome')">Diplôme</button>
        </div>

        @if (session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('postulerper2') }}" enctype="multipart/form-data" class="w-full" onsubmit="handleSubmit(event)">
            @csrf

            <!-- Experience Section -->
            <div id="experience" class="form-section active">
                <div class="section-content">
                    <h1 class="section-header">Enseignement à l'UADB</h1>
                    <div class="mb-6">
                        <label for="nombreanneeuadb" class="form-label">Nombre d'années</label>
                        <input type="number" id="nombreanneeuadb" name="nombreanneeuadb" class="input-field" placeholder="Nombre d'années enseignées à l'UADB">
                    </div>
                    <div class="mb-6">
                        <label for="attestationuadb" class="form-label">Attestation</label>
                        <input type="file" name="attestationuadb" id="attestationuadb" class="input-field" accept="application/pdf">
                    </div>
                </div>
                <hr>
                <div class="section-content">
                    <h1 class="section-header">Expériences Pédagogiques</h1>
                    <div class="mb-6">
                        <label for="nombreanneepedagogiques" class="form-label">Nombre d'années</label>
                        <input type="number" id="nombreanneepedagogiques" name="nombreanneepedagogiques" class="input-field" placeholder="Nombre d'années d'expérience pédagogique">
                    </div>
                    <div class="mb-6">
                        <label for="attestationpedagogique" class="form-label">Attestation</label>
                        <input type="file" name="attestationpedagogique" id="attestationpedagogique" class="input-field" accept="application/pdf">
                    </div>
                </div>
                <hr>
                <div class="section-content">
                    <h1 class="section-header">Expériences Professionnelles</h1>
                    <div class="mb-6">
                        <label for="nombreanneeprofessionnel" class="form-label">Nombre d'années</label>
                        <input type="number" id="nombreanneeprofessionnel" name="nombreanneeprofessionnel" class="input-field" placeholder="Nombre d'années d'expérience professionnelle">
                    </div>
                    <div class="mb-6">
                        <label for="attestationprofessionnel" class="form-label">Attestation</label>
                        <input type="file" name="attestationprofessionnel" id="attestationprofessionnel" class="input-field" accept="application/pdf">
                    </div>
                </div>

                <div class="flex justify-end mt-8">
                    <button type="button" class="form-button" onclick="showSection('niveau')">Suivant</button>
                </div>
            </div>

            <!-- Niveau Section -->
            <div id="niveau" class="form-section">
                <div class="section-content">
                    <h1 class="section-header">GRADE</h1>
                    <div class="mb-16">
                        <label for="typegrade" class="form-label">Grade</label>
                        <select id="typegrade" name="typegrade" class="input-field">
                            <option value="">Sélectionner votre grade</option>
                            <option value="professeurtitulaire">Professeur titulaire</option>
                            <option value="Maitredeconference">Maître de conférence</option>
                            <option value="MaitreAssistant">Maître Assistant</option>
                            <option value="Assistant">Assistant</option>
                            <option value="Debutant">Débutant</option>
                        </select>
                    </div>
                    <div class="mb-16">
                        <label for="attestationgrade" class="form-label">Attestation</label>
                        <input type="file" name="attestationgrade" id="attestationgrade" class="input-field" accept="application/pdf">
                    </div>
                </div>
                <hr>
                <div class="section-content">
                    <h1 class="section-header">Publications</h1>
                    <div class="mb-6">
                        <label for="typepublication" class="form-label">Publication</label>
                        <select id="typepublication" name="typepublication" class="input-field">
                            <option value="">Type de publication</option>
                            <option value="abstract">Dans des revues indexées</option>
                            <option value="comitedelecture">Dans des revues avec comité de lecture</option>
                            <option value="conferenceinternational">Conférence Internationale</option>
                            <option value="conferencenational">Conférence Nationale</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="nombrearticleabstract" class="form-label">Nombre d'articles</label>
                        <input type="number" id="nombrearticleabstract" name="nombrearticleabstract" class="input-field" placeholder="Nombre d'articles">
                    </div>
                    <div class="mb-6">
                        <label for="actedepublication" class="form-label">Attestation</label>
                        <input type="file" name="actedepublication" id="actedepublication" class="input-field" accept="application/pdf">
                    </div>
                </div>
                <hr>
                <div class="section-content">
                    <h1 class="section-header">Adéquation</h1>
                    <div class="mb-16">
                        <label for="degreadequation" class="form-label">Adéquation</label>
                        <select id="degreadequation" name="degreadequation" class="input-field">
                            <option value="">Sélectionner le degré d'adéquation</option>
                            <option value="enseignement">Enseignement</option>
                            <option value="recherche">Recherche</option>
                            <option value="lesdeux">Enseignement et Recherche</option>
                        </select>
                    </div>
                    <div class="mb-16">
                        <label for="actederecherche" class="form-label">Attestation</label>
                        <input type="file" name="actederecherche" id="actederecherche" class="input-field" accept="application/pdf">
                    </div>
                </div>
                <div class="flex justify-between mt-8">
                    <button type="button" class="form-button bg-gray-600 hover:bg-gray-700" onclick="showSection('experience')">Précédent</button>
                    <button type="button" class="form-button" onclick="showSection('diplome')">Suivant</button>
                </div>
            </div>

            <!-- Diplôme Section -->
            <div id="diplome" class="form-section">
                <div class="section-content">
                    <h2 class="section-header">Diplôme</h2>
                    <div id="diplome-container" class="mb-6"></div>
                    <button type="button" onclick="addDiplome()" class="form-button bg-green-600 hover:bg-green-700 mb-4">Ajouter un diplôme</button>
                </div>
                <div class="flex justify-between mt-8">
                    <button type="button" class="form-button bg-gray-600 hover:bg-gray-700" onclick="showSection('niveau')">Précédent</button>
                    <button type="submit" class="form-button">Soumettre</button>
                </div>
            </div>
        </form>
    </div>

    <div class="footer">
        <p>Site créé par Mouhamed Sene et Alioune Badara Gueye</p>
    </div>
</body>
</html>
