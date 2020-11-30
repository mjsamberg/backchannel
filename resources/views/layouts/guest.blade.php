<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
        <script src="https://cdn.ncsu.edu/brand-assets/utility-bar/ub.php?googleCustomSearchCode={{config('ncstate.branding_search_id')}}&placeholder={{config('ncstate.branding_search_label')}}&maxWidth=1100&color=gray&showBrick=1"></script>

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ url(mix('js/app.js')) }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="title mt-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="font-condensed text-center text-4xl font-light"><a href="{{ config('app.url')}}">{{ config('app.name', 'Untitled Application') }}</a></h1>
            <h2 class="text-center"><a href="{{ config('ncstate.uniturl') }}" target="_blank" class="font-condensed text-2xl font-light leading-none text-red">{{ config('ncstate.unitname') }}</a></h2>
        </div>
        <hr class="mt-3 border-red border-2"/>
        <div class="mt-2">
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <footer class="bg-red text-white">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 p-5">
                <div>
                    <div id="orgname" class="text-white font-condensed text-xl font-bold leading-none">
                        <a href="{{ config('ncstate.uniturl') }}" target="_blank">
                            {{ config('ncstate.unitname_formal_l1') }}
                            @if(config('ncstate.unitname_formal_l2')!=null)
                                <br/>
                                {{ config('ncstate.unitname_formal_l2') }}
                            @endif
                        </a>
                    </div>
                    <address class="not-italic">
                        {{ config('ncstate.address_street') }}<br/>
                        {{ config('ncstate.address_line2') }}<br/>
                        {{ config('ncstate.address_city') }}<br/>
                        {{ config('ncstate.address_phone') }}
                    </address>
                    <div id="college" class="mt-4 font-condensed text-xl font-normal uppercase">
                        <a href="{{ config('ncstate.collegeurl') }}" target="_blank"><span id="ncstate" class="font-sans font-bold">NC State</span> {{ config('ncstate.collegename') }}</a>
                    </div>
                </div>
                <div>
                </div>
                <div class="relative">
                    <ul class="absolute bottom-0 right-0 list-none" id="social">
                        <li  class="inline-block">
                            <a class="social-link" href="{{ config('ncstate.facebook') }}" target="_blank">
                                <span class="icon-facebook" aria-hidden="true">
                                    <svg class="fill-current" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32">
                                        <path d="M19.938 9.5h3.938v-5.25h-4.438c-3.438 0-6.063 2.625-6.063 5.25v2.625h-3.938v5.25h3.938v10.5h5.25v-10.5h3.938v-5.25h-3.938v-1.313c0-0.813 0.875-1.313 1.313-1.313z"></path>
                                    </svg>
                                </span>
                                <span class="sr-only">facebook</span>
                            </a>
                        </li>
                        <li class="inline-block">
                            <a class="social-link" href="{{ config('ncstate.twitter') }}" target="_blank">
                                <span class="icon-twitter" aria-hidden="true">
                                    <svg class="fill-current" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32">
                                        <path d="M29.938 7.25c-1 0.438-2.125 0.75-3.25 0.875v-0.063c1.188-0.688 2.125-1.813 2.563-3.125-0.375 0.188-2 1.125-3.688 1.438-1.063-1.125-2.563-1.875-4.313-1.875-3.625 0-5.875 2.938-5.875 5.813 0 0.25 0.125 1.188 0.125 1.25-4.813-0.125-9.125-2.438-11.938-6.063-2 3.625 0.125 6.75 1.563 7.875-0.875 0-1.625-0.188-2.375-0.5 0.188 2.813 2.188 5.063 4.813 5.625-1.063 0.313-2.313 0.125-2.813-0.063 0.813 2.375 2.938 4.063 5.5 4.188-3.938 2.875-8.188 2.563-8.25 2.563 2.5 1.5 5.438 2.375 8.5 2.375 11.438-0.063 17.25-10.188 16.563-17.438 1.25-0.563 2.25-1.625 2.875-2.875z"></path>
                                    </svg>
                                </span>
                                <span class="sr-only">facebook</span>
                            </a>
                        </li>
                    </ul>
            </div>
            </div>
        </footer>

        @stack('modals')
        @isset($scripts)
            <script language="JavaScript" type="module">
                {{ $scripts }}
            </script>
        @endisset
        @livewireScripts
    </body>
</html>
