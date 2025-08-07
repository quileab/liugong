<div>
    <footer>
    <div class="bg-gray-100 py-8 px-4 grid grid-cols-1 gap-12 md:grid-cols-3 text-gray-900">
        <div>
            <img src="{{ asset('images/logo.jpg') }}" class="h-32 rounded-full" alt="LiuGong Logo" />
        </div>
        
        <div>
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Contacto</h2>
                <ul class="mt-4 space-y-2">
                    <li>
                        <a href="#" class="flex items-center gap-2">
                            <x-icon name="o-phone" />
                            <span>+1 234 567 890</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2">
                            <x-icon name="o-envelope" />
                            <span>info@liugong.com</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2">
                            <x-icon name="o-map-pin" />
                            <span>123 Main St, Anytown, USA</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div>
            <h2 class="text-2xl font-bold text-gray-900">Redes Sociales</h2>
            <ul class="mt-4 flex gap-6">
                <li>
                    <a href="#" rel="noreferrer" target="_blank" class="text-gray-700 transition hover:opacity-75">
                        <span class="sr-only">Facebook</span>
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z" clip-rule="evenodd"/>
                            </svg>
                            
                    </a>
                </li>
                <li>
                    <a href="#" rel="noreferrer" target="_blank" class="text-gray-700 transition hover:opacity-75">
                        <span class="sr-only">Instagram</span>
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd" d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z" clip-rule="evenodd"/>
                            </svg>
                            
                    </a>
                </li>
                <li>
                    <a href="#" rel="noreferrer" target="_blank" class="text-gray-700 transition hover:opacity-75">
                        <span class="sr-only">X</span>
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.795 10.533 20.68 2h-3.073l-5.255 6.517L7.69 2H1l7.806 10.91L1.47 22h3.074l5.705-7.07L15.31 22H22l-8.205-11.467Zm-2.38 2.95L9.97 11.464 4.36 3.627h2.31l4.528 6.317 1.443 2.02 6.018 8.409h-2.31l-4.934-6.89Z"/>
                            </svg>
                            
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="bg-gray-100 pt-8">
        <p class="text-center text-xs/relaxed text-gray-500">
            &copy; {{ date('Y') }} Acuña Maquinarias | Todos los derechos reservados.
        </p>
    </div>

    </footer>
</div>