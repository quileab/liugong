<x-layouts.layout>
    <x-web-navbar />
    <div class="bg-gray-100 text-gray-900">
    <main class="container mx-auto px-4 py-8">
        <h1 class="text-3xl text-[var(--color-primary)] font-bold text-center mb-4 animate__animated animate__flipInX">Contacto</h1>
        <div class="max-w-2xl mx-auto">
            <p class="text-lg mb-4 animate__animated animate__fadeInLeft">¿Tienes alguna pregunta o quieres saber más sobre nuestros productos? Completa el siguiente formulario y nos pondremos en contacto contigo a la brevedad.</p>
            <livewire:contact-form />
        </div>
    </main>
    </div>
   <x-web-footer />
</x-layouts.layout>
