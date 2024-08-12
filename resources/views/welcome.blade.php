<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    </head>
    <body>
          <div class="bg-white dark:bg-gray-800 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
              <div class="text-center w-full mx-auto lg:px-8 z-20">
                <img src="{{ asset('images/filament.png') }}" alt="">
                  <h2 class="text-3xl font-extrabold text-black dark:text-white sm:text-4xl">
                      <span class="block">
                        Filament App
                      </span>
                  </h2>
                  <p class="text-xl mt-4 max-w-md mx-auto text-gray-400">
                    Expenses & Budgets App, built using Filament v3.2
                  </p>
                  <div class="lg:mt-0 lg:flex-shrink-0">
                      <div class="mt-6 inline-flex rounded-md shadow">
                          <a type="button" href="{{ route('filament.admin.pages.dashboard') }}" class="py-4 px-6  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                              Go To Dashboard
                          </a>
                      </div>
                  </div>
              </div>
          </div>
          
    </body>
</html>
