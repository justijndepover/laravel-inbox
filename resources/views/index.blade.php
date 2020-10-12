<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        {{-- <link rel="shortcut icon" href="{{ asset('/vendor/horizon/img/favicon.png') }}"> --}}

        <title>Mails{{ config('app.name') ? ' - ' . config('app.name') : '' }}</title>

        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body class="antialiased bg-gray-100">
        <div id="app" class="flex flex-col h-screen">
            <header class="bg-gray-800 flex p-3 items-center">
                <div class="">
                    <a href="https://justijn.netlify.app" target="_blank" class="block w-6 text-gray-300 hover:text-gray-600 transition duration-300">
                        <svg class="" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 300 300" fill="currentColor">
                            <path d="M150,5.1L4.6,203.7L150,294.9l145.4-91.2L150,5.1z M150,272.3L32.1,198.4l31.7-43.3l27.8,17.4l-13.8,18.8 l36.5,22.9v-72.7V86.2L150,37.4V272.3z M185.7,141.5l36.5,49.8l-36.5,22.9V141.5z"/>
                        </svg>
                    </a>
                </div>

                <div class="flex-1 flex justify-center">
                    <input type="search" placeholder="search..." class="bg-gray-700 focus:bg-gray-300 text-gray-500 focus:text-gray-800 focus:placeholder-gray-800 py-1 px-3 text-sm rounded outline-none transition duration-300" style="min-width: 32rem;">
                </div>
            </header>

            <main class="flex-1 overflow-scroll flex">
                <div class="h-full w-full max-w-xs bg-gray-200 border-r overflow-scroll">
                    <a href="#" class="block px-3 py-2 bg-gray-300 hover:bg-gray-400 border-b flex items-center text-gray-700 justify-center">
                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>

                        <span class="text-sm">refresh</span>
                    </a>

                    @foreach ($emails as $sentEmail)
                        <a href="{{ route('inbox', ['id' => $sentEmail->id]) }}" class="block bg-white hover:bg-gray-100 border-b text-sm">
                            <div class="p-6 @if($sentEmail->id == $email->id) border-l-4 border-indigo-600 @endif">
                                <div class="flex justify-between">
                                    <span class="font-semibold">{{ $sentEmail->from_name }}</span>
                                    <span class="text-gray-600">{{ $sentEmail->created_at->format('d/m/Y') }}</span>
                                </div>
                                <span>{{ $sentEmail->subject }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="flex-1 flex flex-col">
                    <div class="bg-white border-b shadow-sm p-4 flex items-center">
                        <svg class="w-5 h-5 mr-4 text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>

                        <span class="text-md text-gray-900">{{ $email->subject }}</span>
                    </div>

                    <div class="flex-1 p-8 overflow-scroll">
                        <div class="bg-white rounded-lg border p-6 shadow-sm">
                            <div class="border-b text-sm pb-4 mb-4 flex justify-between">
                                <div class="flex-1">
                                    <div>
                                        <label class="font-semibold">From: </label>
                                        <span>{{ $email->from_name }}</span>
                                        <a href="mailto:{{ $email->from_email }}" class="text-gray-600">&lt;{{ $email->from_email }}&gt;</a>
                                    </div>
                                    <div>
                                        <label class="font-semibold">To: </label>
                                        <span>{{ $email->to_name }}</span>
                                        <a href="mailto:{{ $email->to_email }}" class="text-gray-600">&lt;{{ $email->to_email }}&gt;</a>
                                    </div>
                                    @if ($email->cc)
                                        <div>
                                            @foreach ($email->cc as $emailaddress => $name)
                                                <label class="font-semibold @if (!$loop->first) text-white @endif">CC: </label>
                                                <span>{{ $name }}</span>
                                                <a href="mailto:{{ $emailaddress }}" class="text-gray-600">&lt;{{ $emailaddress }}&gt;</a>
                                                <br>
                                            @endforeach
                                        </div>
                                    @endif
                                    @if ($email->bcc)
                                        <div>
                                            @foreach ($email->bcc as $emailaddress => $name)
                                                <label class="font-semibold @if (!$loop->first) text-white @endif">BCC: </label>
                                                <span>{{ $name }}</span>
                                                <a href="mailto:{{ $emailaddress }}" class="text-gray-600">&lt;{{ $emailaddress }}&gt;</a>
                                                <br>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <div>
                                    <span class="text-sm text-gray-600">{{ $email->created_at->format('H:i d/m/Y') }}</span>
                                </div>
                            </div>
                            <div class="">
                                {{-- render in iframe to prevent css bleeding --}}
                                {!! $email->body !!}
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>