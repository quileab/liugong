# WARP.md

This file provides guidance to WARP (warp.dev) when working with code in this repository.

## Development Commands

### Start Development Environment
```bash
composer dev
```
This runs a concurrent development environment with PHP server, queue listener, and Vite dev server.

### Individual Services
```bash
# Laravel development server
php artisan serve

# Asset compilation (development)
npm run dev

# Asset compilation (production)
npm run build

# Queue worker
php artisan queue:listen --tries=1
```

### Testing
```bash
composer test
# Or directly:
php artisan test
```

### Code Quality
```bash
# Laravel Pint (code formatting)
./vendor/bin/pint

# View logs in real-time
php artisan pail
```

### Database Operations
```bash
# Run migrations
php artisan migrate

# Run migrations with seeders
php artisan migrate --seed

# Reset and migrate
php artisan migrate:fresh --seed
```

### Single Test Execution
```bash
# Run specific test file
php artisan test tests/Feature/ExampleTest.php

# Run specific test method
php artisan test --filter test_method_name
```

## Code Architecture

### Framework Stack
- **Backend**: Laravel 12 with PHP 8.2+
- **Frontend**: Livewire 3 with Volt class-based components
- **UI Framework**: MaryUI components with Tailwind CSS v4
- **Build Tool**: Vite with Laravel plugin

### Component Architecture
This project uses **Livewire Volt class-based components** exclusively. Components combine PHP logic and Blade templates in single files located in `resources/views/livewire/`.

**Example component structure:**
```php
<?php
use Livewire\Volt\Component;
use Mary\Traits\Toast;

new class extends Component {
    use Toast;
    
    public function mount() { /* Logic */ }
    public function save() { /* Logic */ }
    public function with(): array { /* Data binding */ }
}; ?>

<div>
    <!-- Blade template using MaryUI components -->
</div>
```

### Key Models and Relationships
- `Product` - Main product entity with categories, images, and specifications
- `Category` - Product categorization
- `Post` - Blog/news content
- `Carousel` - Homepage carousel management
- `Contact` - Contact form submissions
- `User` - Authentication and user management

### Directory Structure
- `app/Models/` - Eloquent models
- `app/Livewire/` - Traditional Livewire components (when not using Volt)
- `app/Providers/` - Service providers including custom VoltServiceProvider
- `resources/views/livewire/` - Volt class-based components
- `resources/views/components/` - Reusable Blade components
- `database/migrations/` - Database schema definitions
- `routes/` - Route definitions (web, auth, console)

### Development Patterns
- Use **Spanish for UI text** but **English for variables and functions**
- Prefer **MaryUI components** over custom HTML/CSS
- Use **Tailwind v4 classes** for styling
- Always create **Volt class-based components** for new interactive features
- File uploads stored in `storage/app/public/` with symbolic link to `public/storage/`

### Helper Files
- `app/Helpers/helpers.php` - Global helper functions (auto-loaded via Composer)

### Authentication
Uses Laravel's built-in authentication with Livewire/Volt components in `resources/views/livewire/auth/`.