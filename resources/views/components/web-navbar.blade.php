<div class="flex flex-col sticky top-0 z-50 drop-shadow-md">
  <!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
  <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
  <nav class="bg-gray-100/85">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button-->
          <button type="button" command="--toggle" commandfor="mobile-menu"
            class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon"
              aria-hidden="true" class="size-6 in-aria-expanded:hidden">
              <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon"
              aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
              <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
        </div>
        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex shrink-0 items-center">
            <x-app-brand />
          </div>
          <div class="hidden sm:ml-6 sm:block">
            <div class="flex space-x-4 items-center">
              @foreach($links as $link)
                @if(isset($link['logo_url']))
                  <a href="{{ $link['url'] }}"
                    class="text-[var(--color-primary)] px-3 py-6 hover:bg-[var(--color-secondary)] hover:text-white">
                    {!! inline_svg($link['logo_url'], 'h-4') !!}
                  </a>
                @else
                  @if(isset($link['auth']) && $link['auth'])
                    @auth
                      <a href="{{ $link['url'] }}"
                        class="text-[var(--color-primary)] px-3 py-6 text-sm font-medium hover:bg-[var(--color-secondary)] hover:text-white">{{ $link['label'] }}</a>
                    @endauth
                  @else
                    <a href="{{ $link['url'] }}"
                      class="text-[var(--color-primary)] px-3 py-6 text-sm font-medium hover:bg-[var(--color-secondary)] hover:text-white">{{ $link['label'] }}</a>
                  @endif
                @endif
              @endforeach

            </div>

          </div>

        </div>
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          @auth
            <a href="/dashboard"
              class="flex items-center justify-center h-8 w-8 rounded-full bg-gray-800 text-white text-sm font-bold">
              {{ substr(Auth::user()?->name, 0, 1) }}
            </a>
          @else
            <a href="/login">
              <x-icon name="o-user-circle"
                class="w-8 h-8 text-[var(--color-primary)] hover:text-[var(--color-secondary)] p-1 rounded-full" />
            </a>
          @endauth
        </div>

      </div>
    </div>

    <el-disclosure id="mobile-menu" hidden class="block sm:hidden">
      <div class="space-y-1 px-2 pt-2 pb-3">
        @foreach($links as $link)
          <a href="{{ $link['url'] }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-800 hover:bg-gray-700 hover:text-white">{{ $link['label'] }}</a>
        @endforeach
      </div>
    </el-disclosure>
  </nav>

</div>