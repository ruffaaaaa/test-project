<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="relative bg-green-50 overflow-hidden max-h-screen">
    <aside class="fixed inset-y-0 left-0 bg-white shadow-md max-h-screen w-60 " id="sidebar">
        <div class="flex flex-col justify-between h-full">
            <div class="flex-grow">
                <div class="px-4 py-6 text-center border-b">
                    <img src="/images/lsu-logo 2.png" alt="Logo" class="mx-auto h-10 mb-1">
                    <h1 class=" text-l font-bold leading-none text-green-600 text">
                        <!-- Display this text when not collapsed -->
                        <span class="collapsed:hidden">FACILITIES RESERVATION SYSTEM</span>
                    </h1>
                </div>
                <div class="p-4">
                    <ul class="space-y-1">
                        <li>
                        <a href="admin-dashboard" class="flex  hover:bg-green-300  rounded-xl font-bold text-sm text-gray-900 py-2 px-4">

                            <span class="icon">
                                <!-- Replace the SVG code with your desired icon -->

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path d="M2 4.25A2.25 2.25 0 014.25 2h2.5A2.25 2.25 0 019 4.25v2.5A2.25 2.25 0 016.75 9h-2.5A2.25 2.25 0 012 6.75v-2.5zM2 13.25A2.25 2.25 0 014.25 11h2.5A2.25 2.25 0 019 13.25v2.5A2.25 2.25 0 016.75 18h-2.5A2.25 2.25 0 012 15.75v-2.5zM11 4.25A2.25 2.25 0 0113.25 2h2.5A2.25 2.25 0 0118 4.25v2.5A2.25 2.25 0 0115.75 9h-2.5A2.25 2.25 0 0111 6.75v-2.5zM15.25 11.75a.75.75 0 00-1.5 0v2h-2a.75.75 0 000 1.5h2v2a.75.75 0 001.5 0v-2h2a.75.75 0 000-1.5h-2v-2z" />
                                </svg>      

                            <span class="text ml-3">Dashboard</span>
                        </a>
                        </li>
                        <li>
                            <a href="admin-reservation" class="flex items-center bg-green-600 rounded-xl font-bold text-sm text-white py-2 px-4">
                                <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28" fill="currentColor" class="w-5 h-5">
                                    <path d="M18.563 3.04056V0.987196C18.563 0.447529 18.104 0 17.5505 0C16.997 0 16.538 0.447529 16.538 0.987196V2.96159H7.76291V0.987196C7.76291 0.447529 7.3039 0 6.75039 0C6.19689 0 5.73788 0.447529 5.73788 0.987196V3.04056C2.09283 3.36963 0.324313 5.48881 0.0543094 8.63468C0.0273091 9.01639 0.351313 9.3323 0.729318 9.3323H23.5716C23.9631 9.3323 24.2871 9.00323 24.2466 8.63468C23.9766 5.48881 22.208 3.36963 18.563 3.04056Z" fill="#FFFFFFF"/>
                                    <path d="M21.5998 18.0984C18.6162 18.0984 16.1997 20.4545 16.1997 23.3634C16.1997 24.3506 16.4832 25.2852 16.9827 26.0749C17.9142 27.6018 19.6288 28.6285 21.5998 28.6285C23.5708 28.6285 25.2853 27.6018 26.2168 26.0749C26.7163 25.2852 26.9998 24.3506 26.9998 23.3634C26.9998 20.4545 24.5833 18.0984 21.5998 18.0984ZM24.3943 22.7974L21.5188 25.3905C21.3298 25.5616 21.0733 25.6537 20.8303 25.6537C20.5738 25.6537 20.3173 25.5616 20.1148 25.3642L18.7782 24.0611C18.3867 23.6793 18.3867 23.0475 18.7782 22.6658C19.1697 22.2841 19.8178 22.2841 20.2093 22.6658L20.8573 23.2976L23.0173 21.3496C23.4223 20.981 24.0703 21.0073 24.4483 21.4022C24.8263 21.7971 24.7993 22.4157 24.3943 22.7974Z" fill="#FFFFFF"/>
                                    <path d="M22.9503 11.3064H1.35002C0.607508 11.3064 0 11.8987 0 12.6226V20.7308C0 24.6796 2.02503 27.3121 6.75008 27.3121H13.4057C14.3372 27.3121 14.9852 26.4302 14.6882 25.5746C14.4182 24.8112 14.1887 23.9688 14.1887 23.3633C14.1887 19.375 17.5232 16.1239 21.6138 16.1239C22.0053 16.1239 22.3968 16.1502 22.7748 16.216C23.5848 16.3345 24.3138 15.7158 24.3138 14.9261V12.6358C24.3003 11.8987 23.6928 11.3064 22.9503 11.3064ZM8.38361 22.3235C8.1271 22.5604 7.7761 22.7052 7.42509 22.7052C7.07409 22.7052 6.72308 22.5604 6.46658 22.3235C6.22358 22.0734 6.07508 21.7311 6.07508 21.3889C6.07508 21.0467 6.22358 20.7045 6.46658 20.4544C6.60158 20.3359 6.73658 20.2438 6.91209 20.1779C7.41159 19.9673 8.0056 20.0858 8.38361 20.4544C8.62661 20.7045 8.77511 21.0467 8.77511 21.3889C8.77511 21.7311 8.62661 22.0734 8.38361 22.3235ZM8.38361 17.7165C8.3161 17.7692 8.2486 17.8218 8.1811 17.8745C8.1001 17.9271 8.0191 17.9666 7.9381 17.993C7.8571 18.0324 7.7761 18.0588 7.6951 18.0719C7.6006 18.0851 7.50609 18.0983 7.42509 18.0983C7.07409 18.0983 6.72308 17.9535 6.46658 17.7165C6.22358 17.4664 6.07508 17.1242 6.07508 16.782C6.07508 16.4398 6.22358 16.0975 6.46658 15.8474C6.77709 15.5447 7.24959 15.3999 7.6951 15.4921C7.7761 15.5052 7.8571 15.5315 7.9381 15.571C8.0191 15.5974 8.1001 15.6368 8.1811 15.6895L8.38361 15.8474C8.62661 16.0975 8.77511 16.4398 8.77511 16.782C8.77511 17.1242 8.62661 17.4664 8.38361 17.7165ZM13.1087 17.7165C12.8522 17.9535 12.5012 18.0983 12.1502 18.0983C11.7991 18.0983 11.4481 17.9535 11.1916 17.7165C10.9486 17.4664 10.8001 17.1242 10.8001 16.782C10.8001 16.4398 10.9486 16.0975 11.1916 15.8474C11.7046 15.3604 12.6092 15.3604 13.1087 15.8474C13.3517 16.0975 13.5002 16.4398 13.5002 16.782C13.5002 17.1242 13.3517 17.4664 13.1087 17.7165Z" fill="#FFFFFF"/>
                                </svg>
                                </span>
                                <span class="text ml-3">Reservation</span>
                            </a>
                        </li>
                        <li>
                            <a href="admin-calendar" class="flex  hover:bg-green-300  rounded-xl font-bold text-sm text-gray-900 py-2 px-4">
                                <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28" fill="currentColor" class="w-5 h-5">
                                <path id="Vector" d="M18.2948 3.18727V1.03483C18.2948 0.469123 17.8425 0 17.297 0C16.7515 0 16.2991 0.469123 16.2991 1.03483V3.10449H7.65092V1.03483C7.65092 0.469123 7.19855 0 6.65305 0C6.10755 0 5.65518 0.469123 5.65518 1.03483V3.18727C2.06284 3.53222 0.319897 5.75365 0.0537984 9.05131C0.0271885 9.45144 0.346507 9.78259 0.719046 9.78259H23.231C23.6168 9.78259 23.9361 9.43764 23.8962 9.05131C23.6301 5.75365 21.8872 3.53222 18.2948 3.18727Z" fill="#292D32"/>
                                    <path id="Vector_2" d="M22.6184 11.8521H1.33049C0.598723 11.8521 0 12.4729 0 13.2318V21.7312C0 25.8705 1.99574 28.63 6.65247 28.63H17.2964C21.9532 28.63 23.9489 25.8705 23.9489 21.7312V13.2318C23.9489 12.4729 23.3502 11.8521 22.6184 11.8521ZM8.26237 23.4007C8.19585 23.4559 8.12932 23.5249 8.0628 23.5663C7.98297 23.6215 7.90314 23.6628 7.82331 23.6904C7.74348 23.7318 7.66365 23.7594 7.58382 23.7732C7.49069 23.787 7.41086 23.8008 7.31772 23.8008C7.14476 23.8008 6.97179 23.7594 6.81213 23.6904C6.63917 23.6215 6.50612 23.5249 6.37307 23.4007C6.13358 23.1385 5.98723 22.7798 5.98723 22.4211C5.98723 22.0623 6.13358 21.7036 6.37307 21.4414C6.50612 21.3172 6.63917 21.2206 6.81213 21.1517C7.05162 21.0413 7.31772 21.0137 7.58382 21.0689C7.66365 21.0827 7.74348 21.1103 7.82331 21.1517C7.90314 21.1793 7.98297 21.2207 8.0628 21.2758C8.12932 21.331 8.19585 21.3862 8.26237 21.4414C8.50186 21.7036 8.64822 22.0623 8.64822 22.4211C8.64822 22.7798 8.50186 23.1385 8.26237 23.4007ZM8.26237 18.5715C8.00958 18.8198 7.66365 18.9716 7.31772 18.9716C6.97179 18.9716 6.62586 18.8198 6.37307 18.5715C6.13358 18.3093 5.98723 17.9506 5.98723 17.5918C5.98723 17.2331 6.13358 16.8744 6.37307 16.6122C6.74561 16.2259 7.33103 16.1017 7.82331 16.3225C7.99627 16.3914 8.14263 16.488 8.26237 16.6122C8.50186 16.8744 8.64822 17.2331 8.64822 17.5918C8.64822 17.9506 8.50186 18.3093 8.26237 18.5715ZM12.9191 23.4007C12.6663 23.6491 12.3204 23.8008 11.9745 23.8008C11.6285 23.8008 11.2826 23.6491 11.0298 23.4007C10.7903 23.1385 10.644 22.7798 10.644 22.4211C10.644 22.0623 10.7903 21.7036 11.0298 21.4414C11.5221 20.9309 12.4268 20.9309 12.9191 21.4414C13.1586 21.7036 13.3049 22.0623 13.3049 22.4211C13.3049 22.7798 13.1586 23.1385 12.9191 23.4007ZM12.9191 18.5715C12.8526 18.6267 12.7861 18.6819 12.7195 18.7371C12.6397 18.7923 12.5599 18.8336 12.48 18.8612C12.4002 18.9026 12.3204 18.9302 12.2406 18.944C12.1474 18.9578 12.0676 18.9716 11.9745 18.9716C11.6285 18.9716 11.2826 18.8198 11.0298 18.5715C10.7903 18.3093 10.644 17.9506 10.644 17.5918C10.644 17.2331 10.7903 16.8744 11.0298 16.6122C11.1495 16.488 11.2959 16.3914 11.4689 16.3225C11.9611 16.1017 12.5466 16.2259 12.9191 16.6122C13.1586 16.8744 13.3049 17.2331 13.3049 17.5918C13.3049 17.9506 13.1586 18.3093 12.9191 18.5715ZM17.5758 23.4007C17.323 23.6491 16.9771 23.8008 16.6312 23.8008C16.2853 23.8008 15.9393 23.6491 15.6865 23.4007C15.447 23.1385 15.3007 22.7798 15.3007 22.4211C15.3007 22.0623 15.447 21.7036 15.6865 21.4414C16.1788 20.9309 17.0836 20.9309 17.5758 21.4414C17.8153 21.7036 17.9617 22.0623 17.9617 22.4211C17.9617 22.7798 17.8153 23.1385 17.5758 23.4007ZM17.5758 18.5715C17.5093 18.6267 17.4428 18.6819 17.3763 18.7371C17.2964 18.7923 17.2166 18.8336 17.1368 18.8612C17.0569 18.9026 16.9771 18.9302 16.8973 18.944C16.8041 18.9578 16.711 18.9716 16.6312 18.9716C16.2853 18.9716 15.9393 18.8198 15.6865 18.5715C15.447 18.3093 15.3007 17.9506 15.3007 17.5918C15.3007 17.2331 15.447 16.8744 15.6865 16.6122C15.8196 16.488 15.9526 16.3914 16.1256 16.3225C16.3651 16.2121 16.6312 16.1845 16.8973 16.2397C16.9771 16.2535 17.0569 16.2811 17.1368 16.3225C17.2166 16.3501 17.2964 16.3914 17.3763 16.4466L17.5758 16.6122C17.8153 16.8744 17.9617 17.2331 17.9617 17.5918C17.9617 17.9506 17.8153 18.3093 17.5758 18.5715Z" fill="#292D32"/>
                                </svg>

                                </span>
                                <span class="text ml-3">Calendar</span>
                            </a>
                        </li>
                        <li>
                            <a href="admin-facilities" class="flex  hover:bg-green-300  rounded-xl font-bold text-sm text-gray-900 py-2 px-4">
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 27" fill="currentColor" class="w-5 h-5">
                                        <path d="M26.4045 8.5105L16.704 0.889061C15.2062 -0.294051 12.7845 -0.294051 11.3008 0.875304L1.60023 8.5105C0.508396 9.36345 -0.191498 11.1656 0.0464656 12.5138L1.90818 23.4644C2.24413 25.4179 4.14784 27 6.16354 27H21.8412C23.8429 27 25.7606 25.4042 26.0965 23.4644L27.9582 12.5138C28.1822 11.1656 27.4823 9.36345 26.4045 8.5105ZM14.0024 18.3193C12.0707 18.3193 10.5029 16.7785 10.5029 14.88C10.5029 12.9815 12.0707 11.4407 14.0024 11.4407C15.9341 11.4407 17.5018 12.9815 17.5018 14.88C17.5018 16.7785 15.9341 18.3193 14.0024 18.3193Z" fill="#292D32"/>
                                    </svg>
                                </span>
                                <span class="text ml-3">Facilities</span>
                            </a>
                        </li>
                            <a href="admin-personnels" class="flex items-center hover:bg-green-300 rounded-xl font-bold text-sm text-black py-2 px-4">
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path d="M10 9a3 3 0 100-6 3 3 0 000 6zM6 8a2 2 0 11-4 0 2 2 0 014 0zM1.49 15.326a.78.78 0 01-.358-.442 3 3 0 014.308-3.516 6.484 6.484 0 00-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 01-2.07-.655zM16.44 15.98a4.97 4.97 0 002.07-.654.78.78 0 00.357-.442 3 3 0 00-4.308-3.517 6.484 6.484 0 011.907 3.96 2.32 2.32 0 01-.026.654zM18 8a2 2 0 11-4 0 2 2 0 014 0zM5.304 16.19a.844.844 0 01-.277-.71 5 5 0 019.947 0 .843.843 0 01-.277.71A6.975 6.975 0 0110 18a6.974 6.974 0 01-4.696-1.81z" />
                                    </svg>
                                <span class="text ml-3">Personnels</span>
                            </a>
                        </li>
                        </li>
                            <a href="admin-equipments" class="flex items-center hover:bg-green-300 rounded-xl font-bold text-sm text-black py-2 px-4">
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 23 31" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                        <path d="M16.1748 0H6.82522C1.85434 0 0 1.77697 0 6.54046V24.4595C0 29.223 1.85434 31 6.82522 31H16.1748C21.1457 31 23 29.223 23 24.4595V6.54046C23 1.77697 21.1457 0 16.1748 0ZM11.5 6.54046C12.7933 6.54046 13.8374 7.54094 13.8374 8.78034C13.8374 10.0197 12.7933 11.0202 11.5 11.0202C10.2066 11.0202 9.16256 10.0197 9.16256 8.78034C9.16256 7.54094 10.2066 6.54046 11.5 6.54046ZM11.5 24.4595C8.91324 24.4595 6.82522 22.4586 6.82522 19.9798C6.82522 17.501 8.91324 15.5 11.5 15.5C14.0867 15.5 16.1748 17.501 16.1748 19.9798C16.1748 22.4586 14.0867 24.4595 11.5 24.4595Z" fill="#292D32"/>
                                    </svg>
                                <span class="text ml-3">Equipments</span>
                            </a>
                        </li>
                        </li>
                            <a href="admin-settings" class="flex items-center hover:bg-green-300 rounded-xl font-bold text-sm text-black py-2 px-4">
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M7.84 1.804A1 1 0 018.82 1h2.36a1 1 0 01.98.804l.331 1.652a6.993 6.993 0 011.929 1.115l1.598-.54a1 1 0 011.186.447l1.18 2.044a1 1 0 01-.205 1.251l-1.267 1.113a7.047 7.047 0 010 2.228l1.267 1.113a1 1 0 01.206 1.25l-1.18 2.045a1 1 0 01-1.187.447l-1.598-.54a6.993 6.993 0 01-1.929 1.115l-.33 1.652a1 1 0 01-.98.804H8.82a1 1 0 01-.98-.804l-.331-1.652a6.993 6.993 0 01-1.929-1.115l-1.598.54a1 1 0 01-1.186-.447l-1.18-2.044a1 1 0 01.205-1.251l1.267-1.114a7.05 7.05 0 010-2.227L1.821 7.773a1 1 0 01-.206-1.25l1.18-2.045a1 1 0 011.187-.447l1.598.54A6.993 6.993 0 017.51 3.456l.33-1.652zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                    </svg>
                                <span class="text ml-3">Settings</span>
                            </a>
                        </li>
                    </ul>
                    
                </div>
            </div>
            <div class="p-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="sumbit" class="inline-flex items-center justify-center h-9 py-2 px-3  rounded-xl bg-green-600 text-white text-sm font-semibold transition">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="ml-2" viewBox="0 0 16 18">
                                <path fill-rule="evenodd" d="M3 4.25A2.25 2.25 0 015.25 2h5.5A2.25 2.25 0 0113 4.25v2a.75.75 0 01-1.5 0v-2a.75.75 0 00-.75-.75h-5.5a.75.75 0 00-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 00.75-.75v-2a.75.75 0 011.5 0v2A2.25 2.25 0 0110.75 18h-5.5A2.25 2.25 0 013 15.75V4.25z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M19 10a.75.75 0 00-.75-.75H8.704l1.048-.943a.75.75 0 10-1.004-1.114l-2.5 2.25a.75.75 0 000 1.114l2.5 2.25a.75.75 0 101.004-1.114l-1.048-.943h9.546A.75.75 0 0019 10z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button> <span class="text font-bold text-sm ml-2">Logout</span>
                </form>
            </div>  
        </div>
    </aside>
    <main class="ml-60 p-8  max-h-screen overflow-auto max-w-screen">
        <button id="toggleSidebar" class=" -ml-12 absolute p-2 bg-green-600 rounded-full text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
            </svg>
        </button>
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="mb-3">
                
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Reservee ID</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Event Name</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Facility</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 w-full">
                        @if ($reservationDetails)
                            @foreach($reservationDetails->groupBy('reserveeID') as $reserveeID => $detailsGroup)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm">{{ $reserveeID }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm">{{ $detailsGroup->first()->event_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                    @foreach($detailsGroup as $details)
                                        {{ $details->facilityName }},
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm">{{ $detailsGroup->first()->status }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                <button class="border border-red-500 text-blue-500 px-3 py-1 rounded hover:border-red-600 hover:bg-blue-500 hover:text-white ml-2 viewButton"
                                    onclick="openModal('{{ $reserveeID }}', '{{ $detailsGroup->first()->reserveeName }}', '{{ $detailsGroup->first()->person_in_charge_event }}', '{{ $detailsGroup->first()->contact_details }}',
                                    '{{ $detailsGroup->first()->unit_department_company }}', '{{ $detailsGroup->first()->date_of_filing }}', '{{ $detailsGroup->first()->endorsed_by }}', '{{ $detailsGroup->first()->status }}',
                                    '{{ implode(', ', $detailsGroup->pluck('facilityName')->toArray()) }}', '{{$detailsGroup->first()->event_start_date}}','{{$detailsGroup->first()->event_end_date}}',
                                    '{{$detailsGroup->first()->preparation_start_date}}','{{$detailsGroup->first()->preparation_end_date_time}}','{{$detailsGroup->first()->cleanup_start_date_time}}'
                                    ,'{{$detailsGroup->first()->cleanup_end_date_time}}')">
                                    View
                                </button>
                                <button class="border border-red-500 text-green-500 px-3 py-1 rounded hover:border-red-600 hover:bg-green-500 hover:text-white ml-2 editButton">
                                    Update
                                </button>
                                <button class="border border-red-500 text-red-500 px-3 py-1 rounded hover:border-red-600 hover:bg-red-500 hover:text-white ml-2 editButton">
                                    Delete
                                </button>
                                                       
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>

                </table>
            </div>
        </div>

        <div id="myModal" class="modal max-h-screen overflow-auto">
            <div class="modal-content w-[600px] rounded-2xl mt-40">
            <span class="close text-xl text-white px-2.5 py-1 rounded-full bg-green-600 font-bold absolute top-4 right-6 cursor-pointer " onclick="closeModal()">&times;</span>
                <table class="w-full">
                    <tr>
                        <td><strong>Reservee ID:</strong></td>
                        <td><span id="reserveeID"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Reservee:</strong></td>
                        <td><span class="contents" id="reserveeName"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Person Incharge of Event:</strong></td>
                        <td><span id="person"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Contact No:</strong></td>
                        <td><span id="contact"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Unit/Department/Company:</strong></td>
                        <td><span id="unit"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Date of Filing:</strong></td>
                        <td><span id="date"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Endorsed By:</strong></td>
                        <td><span id="endorsed"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Status:</strong></td>
                        <td><span id="status"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Facility:</strong></td>
                        <td><span id="facilityNames"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Event Date:</strong></td>
                        <td><span id="eventDate"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Event Time:</strong></td>
                        <td><span id="eventTime"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Preparation Date:</strong></td>
                        <td><span id="preparationDate"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Preparation Time:</strong></td>
                        <td><span id="preparationTime"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Cleanup Date:</strong></td>
                        <td><span id="cleanupDate"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Cleanup Time:</strong></td>
                        <td><span id="cleanupTime"></span></td>
                    </tr>
                </table>

                <button onclick="window.print()">Print this page</button>

            </div>
        </div>

        <div id="editModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
            <div class="flex items-center justify-center min-h-screen">
                <div class="transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <a href="/" class="-mt-8">
                                    <img src="/images/lsu-logo 2.png"  class=" mx-auto w-10 h-30" />
                                </a>
                                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Update Reservation Status</h3>
                                <form id="editForm" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mt-2">
                                        <label for="editReserveeID" class="block text-gray-600 text-left font-bold ">Reservation Code:</label>
                                        <input type="text" id="editReserveeID" name="reserveeID" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 h-10">
                                    </div>
                                    
                                    <div class="mt-2">
                                        <label for="editStatus" class="block text-gray-600 text-left font-bold">Status</label>
                                        <select id="editStatus" name="status" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 h-10">
                                            <option value="Approved">Approved</option>
                                            <option value="Not Approved">Not Approved</option>
                                            <option value="Pending">Pending</option>

                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit" form="editForm" class="inline-flex justify-center w-full  border rounded-md border-transparent px-4 py-2 bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">Update</button>
                        <button id="closeModal" class=" inline-flex justify-center rounded-md border border-gray-300 px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:w-auto sm:text-sm">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="/js/index.js"></script>
    <script src="/js/reservationdetails.js"></script>
    <script src='js/modal.js'></script>

  

</body>
</html>
