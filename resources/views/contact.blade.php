<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenue</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="p-5 bg-gray-50 font-body">
    <nav class="z-40 bg-white border-gray-200 shadow-xl rounded-xl dark:bg-gray-900 dark:border-gray-700">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
            <a href="{{ route('welcome') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <x-application-logo class="block w-auto text-gray-800 fill-current h-9" />
            </a>
            <button data-collapse-toggle="navbar-multi-level" type="button"
                class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-multi-level" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
                <ul
                    class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{ route('welcome') }}"
                            class="block px-3 py-2 text-white bg-blue-700 rounded md:bg-transparent md:text-gray-900 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent"
                            aria-current="page">Accueil</a>
                    </li>
                    <li>
                        <a href="{{ route('presentation') }}"
                            class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                            Présentation
                        </a>
                    </li>

                    @guest
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="flex items-center justify-between w-full px-3 py-2 text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                            Connexion
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24">
                                <path stroke="gray" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <a href="{{ route('login') }}"
                                class="block px-4 py-2 text-gray-700 text-md hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                Se connecter
                            </a>
                        </div>
                    </li>
                    @endguest

                    @auth
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="flex items-center justify-between w-full px-3 py-2 text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                            {{ Auth::user()->name }}
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24">
                                <path stroke="gray" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <div class="py-1">
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-responsive-nav-link>
                                </form>
                            </div>
                        </div>
                    </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>

    <!-- Container for demo purpose -->
    <div class="container mx-auto my-8 px-4 md:px-6" id="sectionCible">
        <!-- Section: Design Block -->
        <section class="mb-8">
            <div class="relative h-72 overflow-hidden bg-cover bg-center bg-no-repeat" style="background-image: url('../../public/assets/images/others/campus.png');">
                <div class="absolute inset-0 bg-blue-900 bg-opacity-70 flex items-center justify-center">
                    <h2 class="text-4xl font-bold text-white uppercase">
                        Contacter nous !
                    </h2>
                </div>
            </div>
            <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto my-12 px-4 md:px-6">

        <!-- Section: Contact Form and Info -->
        <section class="flex flex-wrap bg-white rounded-lg shadow-lg">
            <!-- Contact Form -->
            <div class="w-full lg:w-1/2 p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Laissez-nous un message</h3>
                <form method="POST" action="#">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Nom complet</label>
                        <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Adresse mail</label>
                        <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div class="mb-6">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-700">Numéro de téléphone</label>
                        <input type="text" name="phone" id="phone" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div class="mb-6">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-700">Message</label>
                        <textarea name="message" id="message" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
                    </div>
                    <button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Envoyer
                    </button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="w-full lg:w-1/2 p-8 bg-gray-50">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Nos informations de contact</h3>
                <div class="space-y-8">
                    <div class="flex items-start">
                        <div class="p-4 text-white bg-blue-500 rounded-full">
                            <svg aria-hidden="true" focusable="false" class="w-6 h-6" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19 3h-1V1c0-.6-.4-1-1-1H7c-.6 0-1 .4-1 1v2H5C3.3 3 2 4.3 2 6v14c0 1.7 1.3 3 3 3h14c1.7 0 3-1.3 3-3V6c0-1.7-1.3-3-3-3zm-7 18c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8zm0-14c-3.3 0-6 2.7-6 6s2.7 6 6 6 6-2.7 6-6-2.7-6-6-6zm0 10c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4zm7-10h-2v-2h2v2z"/>
                            </svg>
                        </div>
                        <div class="ml-6">
                            <p class="mb-2 text-lg font-semibold text-gray-800">Campus</p>
                            <p class="text-gray-600">Bureau des admissions</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="p-4 text-white bg-blue-500 rounded-full">
                            <svg aria-hidden="true" focusable="false" class="w-6 h-6" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19 3h-1V1c0-.6-.4-1-1-1H7c-.6 0-1 .4-1 1v2H5C3.3 3 2 4.3 2 6v14c0 1.7 1.3 3 3 3h14c1.7 0 3-1.3 3-3V6c0-1.7-1.3-3-3-3zm-7 18c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8zm0-14c-3.3 0-6 2.7-6 6s2.7 6 6 6 6-2.7 6-6-2.7-6-6-6zm0 10c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4zm7-10h-2v-2h2v2z"/>
                            </svg>
                        </div>
                        <div class="ml-6">
                            <p class="mb-2 text-lg font-semibold text-gray-800">Adresse</p>
                            <p class="text-gray-600">BP 30 Bambey/Centre de Ressources de l'UAD à Dakar, Villa N° 03, Mermoz Pyrotechnie</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="p-4 text-white bg-blue-500 rounded-full">
                            <svg aria-hidden="true" focusable="false" class="w-6 h-6" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19 3h-1V1c0-.6-.4-1-1-1H7c-.6 0-1 .4-1 1v2H5C3.3 3 2 4.3 2 6v14c0 1.7 1.3 3 3 3h14c1.7 0 3-1.3 3-3V6c0-1.7-1.3-3-3-3zm-7 18c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8zm0-14c-3.3 0-6 2.7-6 6s2.7 6 6 6 6-2.7 6-6-2.7-6-6-6zm0 10c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4zm7-10h-2v-2h2v2z"/>
                            </svg>
                        </div>
                        <div class="ml-6">
                            <p class="mb-2 text-lg font-semibold text-gray-800">Email</p>
                            <p class="text-gray-600">drh@uadb.edu.sn</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="p-4 text-white bg-blue-500 rounded-full">
                            <svg aria-hidden="true" focusable="false" class="w-6 h-6" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M21 10h-3V8c0-4.4-3.6-8-8-8S2 3.6 2 8v2H-1c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h22c1.1 0 2-.9 2-2v-8c0-1.1-.9-2-2-2zM4 8c0-3.3 2.7-6 6-6s6 2.7 6 6v2H4V8zm14 12H-1v-6h22v6zM5 18c0-.6.4-1 1-1s1 .4 1 1-.4 1-1 1-1-.4-1-1zm5 0c0-.6.4-1 1-1s1 .4 1 1-.4 1-1 1-1-.4-1-1zm5 0c0-.6.4-1 1-1s1 .4 1 1-.4 1-1 1-1-.4-1-1z"/>
                            </svg>
                        </div>
                        <div class="ml-6">
                            <p class="mb-2 text-lg font-semibold text-gray-800">Téléphone</p>
                            <p class="text-gray-600">33 973 34 27</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>

        </section>
        <!-- Section: Design Block -->
    </div>


    <!-- pied de page -->

<footer
class="bg-white text-center text-surface/75 dark:bg-neutral-700 dark:text-white/75 lg:text-left my-25">
<div
  class="flex items-center justify-center border-b-2 border-neutral-200 p-6 dark:border-white/10 lg:justify-between">
  <div class="me-12 hidden lg:block">
    <span>Connectez-vous avec nous sur les réseaux sociaux:</span>
  </div>
  <!-- Social network icons container -->
  <div class="flex justify-center">
    <a href="https://www.facebook.com/www.uadb.edu.sn/?_rdc=1&_rdr" class="me-6 [&>svg]:h-4 [&>svg]:w-4">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="currentColor"
        viewBox="0 0 320 512">
        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
        <path
          d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
      </svg>
    </a>
    <a href="https://uadb.edu.sn/" class="me-6 [&>svg]:h-4 [&>svg]:w-4">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="currentColor"
        viewBox="0 0 488 512">
        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
        <path
          d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z" />
      </svg>
    </a>
    <a href="#!" class="me-6 [&>svg]:h-4 [&>svg]:w-4">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="currentColor"
        viewBox="0 0 448 512">
        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
        <path
          d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
      </svg>
      <a href="https://www.youtube.com/channel/UCsvzgLKaYblSpREyVrc6tLA/videos" class="[&>svg]:h-4 [&>svg]:w-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
            <path d="M23.84 7.61c-.24-1.81-.96-3.22-2.09-4.3C19.34 2.1 12 2 12 2S4.65 2.1 3.25 3.31c-1.13 1.08-1.85 2.49-2.09 4.3C1 9.68 1 12 1 12s0 2.32.16 4.39c.24 1.81.96 3.22 2.09 4.3C4.65 21.9 12 22 12 22s7.35-.1 8.75-1.31c1.13-1.08 1.85-2.49 2.09-4.3.15-2.07.15-4.39.15-4.39s0-2.32-.15-4.39zM9.5 15.5V8.94l6.75 3.29-6.75 3.27z" />
        </svg>
    </a>
  </div>
</div>

<!-- Main container div: holds the entire content of the footer, including four sections (TW Elements, Products, Useful links, and Contact), with responsive styling and appropriate padding/margins. -->
<div class="mx-6 py-10 text-center md:text-left">
  <div class="grid-1 grid gap-8 md:grid-cols-2 lg:grid-cols-4">
    <!-- TW Elements section -->
    <div class="">
      <h6
        class="mb-4 flex items-center justify-center font-semibold uppercase md:justify-start">
        <span class="me-3 [&>svg]:h-4 [&>svg]:w-4">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor">
            <path
              d="M12.378 1.602a.75.75 0 00-.756 0L3 6.632l9 5.25 9-5.25-8.622-5.03zM21.75 7.93l-9 5.25v9l8.628-5.032a.75.75 0 00.372-.648V7.93zM11.25 22.18v-9l-9-5.25v8.57a.75.75 0 00.372.648l8.628 5.033z" />
          </svg>
        </span>
        UADB
      </h6>
      <p>
        Votre source de recrutement en ligne
      </p>
    </div>
    <!-- Products section -->
    <div>
      <h6
        class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
        Produits
      </h6>
      <p class="mb-4">
        <a href="#!">Laravel</a>
      </p>
      <p class="mb-4">
        <a href="#!">nodejs</a>
      </p>
      <p class="mb-4">
        <a href="#!"></a>
      </p>
      <p>
        <a href="#!">html, css, js</a>
      </p>
    </div>
    <div>
      <h6
        class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
        Liens utiles
      </h6>
      <p class="mb-4">
        <a href="/">Accueil</a>
      </p>
      <p class="mb-4">
        <a href="presentation">A Propos</a>
      </p>
      <p>
        <a href="#!">Contact</a>
      </p>
    </div>
    <!-- Contact section -->
    <div>
      <h6
        class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
        Contact
      </h6>
      <p class="mb-4 flex items-center justify-center md:justify-start">
        <span class="me-3 [&>svg]:h-5 [&>svg]:w-5">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor">
            <path
              d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
            <path
              d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
          </svg>
        </span>
        Dakar, villa N° 03, sénégal
      </p>
      <p class="mb-4 flex items-center justify-center md:justify-start">
        <span class="me-3 [&>svg]:h-5 [&>svg]:w-5">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor">
            <path
              d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
            <path
              d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
          </svg>
        </span>
         drh@uadb.edu.sn
      </p>
      <p class="mb-4 flex items-center justify-center md:justify-start">
        <span class="me-3 [&>svg]:h-5 [&>svg]:w-5">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor">
            <path
              fill-rule="evenodd"
              d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z"
              clip-rule="evenodd" />
          </svg>
        </span>
        33 973 34 27
      </p>
      <p class="flex items-center justify-center md:justify-start">
        <span class="me-3 [&>svg]:h-5 [&>svg]:w-5">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor">
            <path
              fill-rule="evenodd"
              d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 003 3h.27l-.155 1.705A1.875 1.875 0 007.232 22.5h9.536a1.875 1.875 0 001.867-2.045l-.155-1.705h.27a3 3 0 003-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0018 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM16.5 6.205v-2.83A.375.375 0 0016.125 3h-8.25a.375.375 0 00-.375.375v2.83a49.353 49.353 0 019 0zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 01-.374.409H7.232a.375.375 0 01-.374-.409l.526-5.784a.373.373 0 01.333-.337 41.741 41.741 0 018.566 0zm.967-3.97a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H18a.75.75 0 01-.75-.75V10.5zM15 9.75a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V10.5a.75.75 0 00-.75-.75H15z"
              clip-rule="evenodd" />
          </svg>
        </span>
        33 860 64 67
      </p>
    </div>
  </div>
</div>
<div class="bg-gray-300 p-6 text-center">
  <span>© 2023 Copyright:</span>
  <a class="font-semibold" href="#"
    >UADB</a
  >
</div>
</footer>
</body>
</html>
