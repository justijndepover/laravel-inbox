<template>
    <div>
        <div class="bg-white border-b shadow-sm p-4 flex items-center">
            <svg class="w-5 h-5 mr-4 text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>

            <span class="text-md text-gray-900">Email subject</span>
        </div>

        <div class="flex-1 p-8 overflow-scroll">
            <div class="bg-white rounded-lg border p-6 shadow-sm">
                <div class="border-b text-sm pb-4 mb-4 flex justify-between">
                    <div class="flex-1">
                        <div>
                            <label class="font-semibold">From: </label>
                            <span>From name</span>
                            <a href="mailto:From email" class="text-gray-600">&lt;From email&gt;</a>
                        </div>
                        <div>
                            <label class="font-semibold">To: </label>
                            <span>To name</span>
                            <a href="mailto:To email" class="text-gray-600">&lt;To email&gt;</a>
                        </div>
                        <!-- @if ($email->cc)
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
                        @endif -->
                    </div>

                    <div>
                        <!-- <span class="text-sm text-gray-600">{{ $email->created_at->format('H:i d/m/Y') }}</span> -->
                    </div>
                </div>

                <div class="">
                    <!-- {!! $email->body !!} -->
                </div>
            </div>

            <div class="flex justify-center pt-8">
                <a href="https://justijn.netlify.app" target="_blank" class="block w-6 text-gray-200 hover:text-gray-600 transition duration-300">
                    <svg class="" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 300 300" fill="currentColor">
                        <path d="M150,5.1L4.6,203.7L150,294.9l145.4-91.2L150,5.1z M150,272.3L32.1,198.4l31.7-43.3l27.8,17.4l-13.8,18.8 l36.5,22.9v-72.7V86.2L150,37.4V272.3z M185.7,141.5l36.5,49.8l-36.5,22.9V141.5z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
}
</script>