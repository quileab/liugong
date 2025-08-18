<div>
    <footer>
        <div class="bg-gray-100 py-8 px-4 text-gray-900">
            <div class="flex flex-col md:flex-row items-center justify-center gap-8 text-center md:text-left">
                <div class="flex items-center justify-center">
                    <img src="{{ asset('images/logo.jpg') }}" class="h-32 rounded-full" alt="LiuGong Logo" />
                </div>

                <div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Contacto</h2>
                        <ul class="mt-4 space-y-2 flex flex-col items-center md:items-start">
                            <li>
                                <a href="tel:+5493482643886" class="flex items-center gap-2">
                                    <x-icon name="o-phone" />
                                    <span>+54 9 3482 643886</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:info@liugong.com" class="flex items-center gap-2">
                                    <x-icon name="o-envelope" />
                                    <span>info@liugong.com</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/acunamaquinarias/" rel="noreferrer" target="_blank"
                                    class="text-gray-700 transition hover:opacity-75 flex items-center gap-1">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor" fill-rule="evenodd"
                                            d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Instagram</span>

                                </a>
                            </li>
                            <li>
                                <a href="https://www.google.com/maps/place/ACU%C3%91A+MAQUINARIAS+SRL/@-29.1878983,-59.6864258,17z/data=!3m1!4b1!4m6!3m5!1s0x944eaf454973601b:0x1a829da1c9ceda0d!8m2!3d-29.1878983!4d-59.6864258!16s%2Fg%2F11g0dhbwcq?entry=ttu&g_ep=EgoyMDI1MDgxMy4wIKXMDSoASAFQAw%3D%3D"
                                    rel="noreferrer" target="_blank" class="flex items-center gap-2">
                                    <x-icon name="o-map-pin" />
                                    <span>Ruta Nacional 11 km783, Reconquista, Santa Fe, Argentina</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>

        <div class="bg-gray-100 pt-8">
            <p class="text-center text-xs/relaxed text-gray-500">
                &copy; {{ date('Y') }} Acuña Maquinarias | Todos los derechos reservados.
            </p>
        </div>

    </footer>
</div>
