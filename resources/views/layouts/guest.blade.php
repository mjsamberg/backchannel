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
            <h1>{{ config('app.name', 'Untitled Application') }}</h1>
            <h2><a href="{{ config('ncstate.uniturl') }}" target="_blank">{{ config('ncstate.unitname') }}</a></h2>
        </div>
        <hr class="mt-3 border-red border-2"/>
        <div class="mt-2">
            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <footer>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 p-5">
                <div>
                    <div id="orgname">
                        <a href="{{ config('ncstate.uniturl') }}" target="_blank">
                            {{ config('ncstate.unitname_formal_l1') }}
                            @if(config('ncstate.unitname_formal_l2')!=null)
                                <br/>
                                {{ config('ncstate.unitname_formal_l2') }}
                            @endif
                        </a>
                    </div>
                    <address>
                        {{ config('ncstate.address_street') }}<br/>
                        {{ config('ncstate.address_line2') }}<br/>
                        {{ config('ncstate.address_city') }}<br/>
                        {{ config('ncstate.address_phone') }}
                    </address>
                    <div id="college" class="mt-4">
                        <a href="{{ config('ncstate.collegeurl') }}" target="_blank"><span id="ncstate">NC State</span> {{ config('ncstate.collegename') }}</a>
                    </div>
                </div>
                <div>
                </div>
                <div class="relative">
                    <ul class="absolute bottom-0 right-0 list-none" id="social">
                        <li>
                            <a class="social-link" href="{{ config('ncstate.facebook') }}" target="_blank">
                                <span class="icon-facebook" aria-hidden="true">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32">
                                        <path d="M19.938 9.5h3.938v-5.25h-4.438c-3.438 0-6.063 2.625-6.063 5.25v2.625h-3.938v5.25h3.938v10.5h5.25v-10.5h3.938v-5.25h-3.938v-1.313c0-0.813 0.875-1.313 1.313-1.313z"></path>
                                    </svg>
                                </span>
                                <span class="sr-only">facebook</span>
                            </a>
                        </li>
                        <li>
                            <a class="social-link" href="{{ config('ncstate.twitter') }}" target="_blank">
                                <span class="icon-twitter" aria-hidden="true">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32">
                                        <path d="M19.938 9.5h3.938v-5.25h-4.438c-3.438 0-6.063 2.625-6.063 5.25v2.625h-3.938v5.25h3.938v10.5h5.25v-10.5h3.938v-5.25h-3.938v-1.313c0-0.813 0.875-1.313 1.313-1.313z"></path>
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
        <script language="JavaScript" type="module">
            {{ $scripts }}
        </script>
        @livewireScripts
    </body>
</html>
