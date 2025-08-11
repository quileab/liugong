<x-layouts.layout>
    <x-web-navbar />
    <div class="bg-gray-100 text-gray-900">
    <main class="container mx-auto px-4 py-8">
        <h1 class="text-3xl text-[var(--color-primary)] font-bold text-center mb-4 animate__animated animate__flipInX">Contacto</h1>
        <div class="max-w-2xl mx-auto">
            <p class="text-lg mb-4 animate__animated animate__fadeInLeft">¿Tienes alguna pregunta o quieres saber más sobre nuestros productos? Completa el siguiente formulario y nos pondremos en contacto contigo a la brevedad.</p>
            <form action="#" method="POST" class="space-y-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name" autocomplete="name" class="py-3 px-4 block w-full shadow-sm focus:ring-primary focus:border-primary border-gray-300 rounded-md">
                    </div>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" class="py-3 px-4 block w-full shadow-sm focus:ring-primary focus:border-primary border-gray-300 rounded-md">
                    </div>
                </div>
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700">Mensaje</label>
                    <div class="mt-1">
                        <textarea id="message" name="message" rows="4" class="py-3 px-4 block w-full shadow-sm focus:ring-primary focus:border-primary border-gray-300 rounded-md"></textarea>
                    </div>
                </div>
                <div>
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Enviar Mensaje
                    </button>
                </div>
            </form>
        </div>
    </main>
    </div>
   <x-web-footer />
</x-layouts.layout>
