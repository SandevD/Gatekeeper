<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/components-v2.css') }}">
    <script src="{{ asset('assets/js/components-v2.js') }}"></script>
    <script src="{{ asset('assets/js/iframe.js') }}" defer></script>
    <script src="{{ asset('assets/js/alpine.js') }}" defer></script>
</head>

<body class="antialiased bg-gray-800 ">
    <div class="" style="">
        <div class="relative bg-gray-800 overflow-hidden">
            <div class="hidden sm:block sm:absolute sm:inset-0" aria-hidden="true">
                <svg class="absolute bottom-0 right-0 transform translate-x-1/2 mb-48 text-gray-700 lg:top-0 lg:mt-28 lg:mb-0 xl:transform-none xl:translate-x-0"
                    width="364" height="384" viewBox="0 0 364 384" fill="none">
                    <defs>
                        <pattern id="eab71dd9-9d7a-47bd-8044-256344ee00d0" x="0" y="0" width="20"
                            height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" fill="currentColor">
                            </rect>
                        </pattern>
                    </defs>
                    <rect width="364" height="384" fill="url(#eab71dd9-9d7a-47bd-8044-256344ee00d0)"></rect>
                </svg>
            </div>
            <div class="relative pt-6 pb-16 sm:pb-24">
                <div x-data="Components.popover({ open: false, focus: true })" x-init="init()" @keydown.escape="onEscape"
                    @close-popover-group.window="onClosePopoverGroup">
                    <nav class="relative max-w-7xl mx-auto flex items-center justify-between px-4 sm:px-6"
                        aria-label="Global">
                        <div class="flex items-center flex-1">
                            <div class="flex items-center justify-between w-full md:w-auto">
                                <a href="#">
                                    <span class="sr-only">Workflow</span>
                                    <img class="h-8 w-auto sm:h-20" src="/assets/img/logo.svg" alt="">
                                </a>
                                <div class="-mr-2 flex items-center md:hidden">
                                    <button type="button"
                                        class="bg-gray-800 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-700 focus:outline-none focus:ring-2 focus-ring-inset focus:ring-white"
                                        @click="toggle" @mousedown="if (open) $event.preventDefault()"
                                        aria-expanded="false" :aria-expanded="open.toString()">
                                        <span class="sr-only">Open main menu</span>
                                        <svg class="h-6 w-6" x-description="Heroicon name: outline/menu"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 12h16M4 18h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="hidden space-x-10 md:flex md:ml-10">

                                <a href="#" class="font-medium text-white hover:text-gray-300">Bitrix 24</a>

                                <a href="#" class="font-medium text-white hover:text-gray-300">DMS ( Coming Soon
                                    )</a>

                                {{-- <a href="https://zuse.lifehrms.com/" class="font-medium text-white hover:text-gray-300">LIFEHRMS</a>

                                <a href="#" class="font-medium text-white hover:text-gray-300">Company</a> --}}

                            </div>
                        </div>
                        <div class="hidden md:flex">
                            <a href="/app"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700">
                                Log in
                            </a>
                        </div>
                    </nav>


                    <div x-show="open" x-transition:enter="duration-150 ease-out"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        x-description="Mobile menu, show/hide based on menu open state."
                        class="absolute z-10 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden"
                        x-ref="panel" @click.away="open = false">
                        <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                            <div class="px-5 pt-4 flex items-center justify-between">
                                <div>
                                    <img class="h-8 w-auto"
                                        src="https://tailwindui.com/img/logos/workflow-mark-sky-600.svg" alt="">
                                </div>
                                <div class="-mr-2">
                                    <button type="button"
                                        class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-sky-500"
                                        @click="toggle">
                                        <span class="sr-only">Close menu</span>
                                        <svg class="h-6 w-6" x-description="Heroicon name: outline/x"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <a href="#"
                                class="block w-full px-5 py-3 text-center font-medium text-sky-600 bg-gray-50 hover:bg-gray-100">
                                Log in
                            </a>
                        </div>
                    </div>

                </div>

                <main class="mt-16 sm:mt-24">
                    <div class="mx-auto max-w-7xl">
                        <div class="lg:grid lg:grid-cols-12 lg:gap-8">
                            <div
                                class="px-4 sm:px-6 sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left lg:flex lg:items-center">
                                <div>
                                    <a href="#"
                                        class="inline-flex items-center text-white bg-gray-900 rounded-full p-1 pr-2 sm:text-base lg:text-sm xl:text-base hover:text-gray-200">
                                        <span
                                            class="px-3 py-0.5 text-white text-xs font-semibold leading-5 uppercase tracking-wide bg-emerald-500 rounded-full">Zuse</span>
                                        <span class="ml-4 text-sm">Gatekeeper</span>
                                        <svg class="ml-2 w-5 h-5 text-gray-500"
                                            x-description="Heroicon name: solid/chevron-right"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                    <h1
                                        class="mt-4 text-4xl tracking-tight font-bold text-white sm:mt-5 sm:leading-none lg:mt-6 lg:text-5xl xl:text-6xl">
                                        <span class="md:block">A solution to your</span>
                                        <!-- space -->
                                        <span class="text-sky-400 md:block"><span
                                                class="text-emerald-400">paper-less</span> future</span>
                                    </h1>
                                    <p class="mt-3 text-base text-gray-300 sm:mt-5 sm:text-xl lg:text-lg xl:text-xl">
                                        The system provides real-time monitoring and automated validation of passes. By
                                        embracing this web solution, organizations can achieve higher productivity, cost
                                        savings, and environmental sustainability, contributing to a greener and more
                                        efficient future.
                                    </p>
                                    {{-- <p class="mt-8 text-sm text-white uppercase tracking-wide font-semibold sm:mt-10">
                                        Used by</p>
                                    <div class="mt-5 w-full sm:mx-auto sm:max-w-lg lg:ml-0">
                                        <div class="flex flex-wrap items-start justify-between">
                                            <div class="flex justify-center px-1">
                                                <img class="h-9 sm:h-10"
                                                    src="https://tailwindui.com/img/logos/tuple-logo-gray-400.svg"
                                                    alt="Tuple">
                                            </div>
                                            <div class="flex justify-center px-1">
                                                <img class="h-9 sm:h-10"
                                                    src="https://tailwindui.com/img/logos/workcation-logo-gray-400.svg"
                                                    alt="Workcation">
                                            </div>
                                            <div class="flex justify-center px-1">
                                                <img class="h-9 sm:h-10"
                                                    src="https://tailwindui.com/img/logos/statickit-logo-gray-400.svg"
                                                    alt="StaticKit">
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="mt-16 sm:mt-24 lg:mt-0 lg:col-span-6">
                                <div
                                    class="bg-white sm:max-w-md sm:w-full sm:mx-auto sm:rounded-lg sm:overflow-hidden">
                                    <div class="px-4 py-8 sm:px-10">
                                        <div>
                                            <div class="mt-1 grid grid-cols-2 gap-3">
                                                {{-- <div class="cursor-pointer" id="staff">
                                                    <a id="staffButton"
                                                        class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-sky-600 text-sm font-medium text-white">
                                                        <span class="sr-only">Staff Registration</span>
                                                        <p>Staff Members</p>
                                                    </a>
                                                </div>

                                                <div class="cursor-pointer" id="leader">
                                                    <a id="leaderButton"
                                                        class="leader w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium  hover:bg-gray-50">
                                                        <span class="sr-only">Management</span>
                                                        <p>Management</p>
                                                    </a>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="mt-6 relative">
                                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                                <div class="w-full border-t border-gray-300"></div>
                                            </div>
                                            <div class="relative flex justify-center text-lg">
                                                <span class="px-2 bg-white text-gray-500">
                                                    <span class="text-sky-500 font-semibold">G</span>atekeeper
                                                    <span class="text-sky-500 font-semibold">R</span>egistration
                                                </span>
                                            </div>
                                        </div>

                                        <div class="mt-10">
                                            <form id="staffForm" action="{{ route('register.staff') }}"
                                                method="GET" class="space-y-6">
                                                <div>
                                                    <label for="name" class="sr-only">Full name</label>
                                                    <input type="text" name="name" id="name"
                                                        autocomplete="off" placeholder="Full name" required
                                                        class="block w-full shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm border-gray-300 rounded-md">
                                                    <input type="hidden" name="role" id="role"
                                                        value="6">
                                                </div>

                                                <div>
                                                    <label for="epf_no" class="sr-only">Employee Code</label>
                                                    <input type="text" name="epf_no" id="epf_no"
                                                        autocomplete="off" placeholder="Employee Code ( eg:- 0000XX )"
                                                        required
                                                        class="block w-full shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div>
                                                    <label for="email" class="sr-only">Email</label>
                                                    <input type="text" name="email" id="email"
                                                        autocomplete="email" placeholder="Email" required
                                                        class="block w-full shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div>
                                                    <label for="SBU" class="sr-only">Select SBU</label>
                                                    <select name="SBU" id="SBU" autocomplete="off" required
                                                        class="block w-full shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm border-gray-300 text-gray-600 rounded-md">>
                                                        <option value="" class="text-gray-600" disabled selected
                                                            hidden>Select SBU</option>
                                                        @forelse ($departments as $department)
                                                            <option value="{{ $department->id }}"
                                                                class="text-gray-600">
                                                                {{ $department->name }}</option>
                                                        @empty
                                                            <option value="" class="text-gray-600">Not available
                                                                yet...</option>
                                                        @endforelse
                                                    </select>
                                                </div>

                                                <div>
                                                    <label for="password" class="sr-only">Password</label>
                                                    <input id="password" name="password" type="password"
                                                        placeholder="Password" autocomplete="current-password"
                                                        required
                                                        class="block w-full shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div>
                                                    <button type="submit"
                                                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                                                        Create your account
                                                    </button>
                                                </div>
                                            </form>
                                            <form id="leaderForm" action="#" method="POST"
                                                class="space-y-6 hidden">
                                                <div>
                                                    <label for="name" class="sr-only">Full name</label>
                                                    <input type="text" name="name" id="name"
                                                        autocomplete="name" placeholder="Full name" required
                                                        class="block w-full shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div>
                                                    <label for="Email" class="sr-only">Email</label>
                                                    <input type="text" name="Email" id="Email"
                                                        autocomplete="email" placeholder="Email" required
                                                        class="block w-full shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div>
                                                    <label for="SBU" class="sr-only">Select SBU</label>
                                                    <select name="SBU" id="SBU" autocomplete="off"
                                                        class="block w-full shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm border-gray-300 text-gray-600 rounded-md">
                                                        <option value="" class="text-gray-600" disabled selected
                                                            hidden>Select SBU</option>
                                                        @forelse ($departments as $department)
                                                            <option value="{{ $department->id }}"
                                                                class="text-gray-600">
                                                                {{ $department->name }}</option>
                                                        @empty
                                                            <option value="" class="text-gray-600">Not available
                                                                yet...</option>
                                                        @endforelse
                                                    </select>
                                                </div>

                                                <div>
                                                    <label for="position" class="sr-only">Select Position</label>
                                                    <select name="position" id="position" autocomplete="off"
                                                        class="block w-full shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm border-gray-300 text-gray-600 rounded-md">
                                                        <option value="" class="text-gray-600" disabled selected
                                                            hidden>Select Position</option>
                                                        <option value="2" class="text-gray-600">HOD</option>
                                                        <option value="5" class="text-gray-600">HR Partner
                                                        </option>
                                                    </select>
                                                </div>

                                                <div>
                                                    <label for="password" class="sr-only">Password</label>
                                                    <input id="password" name="password" type="password"
                                                        placeholder="Password" autocomplete="current-password"
                                                        required
                                                        class="block w-full shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div>
                                                    <button type="submit"
                                                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                                                        Create your account
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="px-4 py-6 bg-gray-50 border-t-2 border-gray-200 sm:px-10">
                                        <p class="text-xs leading-5 text-gray-500">
                                            * After your account is created, it will be sent for HOD approval.
                                            <br />
                                            Once the approval has been granted, you can apply for exit passes.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

    </div>

    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script>
        document.getElementById("staff").addEventListener("click", function() {
            showForm('staff');
        });
        document.getElementById("leader").addEventListener("click", function() {
            showForm('leader');
        });

        function showForm(role) {
            const staffForm = document.querySelector('#staffForm');
            const staffButton = document.querySelector('#staffButton');
            const leaderForm = document.querySelector('#leaderForm');
            const leaderButton = document.querySelector('#leaderButton');
            if (role) {
                if (role == 'staff') {
                    staffForm.classList.remove('hidden');
                    staffForm.classList.add('block');
                    staffButton.classList.add('bg-sky-600', 'text-white');
                    staffButton.classList.remove('hover:bg-gray-50');

                    leaderButton.classList.remove('bg-sky-600', 'text-white');
                    leaderButton.classList.add('hover:bg-gray-50');
                    leaderForm.classList.add('hidden');
                } else if (role == 'leader') {
                    leaderForm.classList.remove('hidden');
                    leaderForm.classList.add('block');
                    leaderButton.classList.add('bg-sky-600', 'text-white');
                    leaderButton.classList.remove('hover:bg-gray-50');

                    staffButton.classList.remove('bg-sky-600', 'text-white');
                    staffButton.classList.add('hover:bg-gray-50');
                    staffForm.classList.add('hidden');
                }
            }
        }
    </script>

    @include('partials.notify');
</body>

</html>
