<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ClearCacheController extends Controller
{
    public function __invoke($option = null)
    {
        $response = new StreamedResponse(function() use ($option) {
            echo '<!DOCTYPE html><html><head><title>Limpiando Cache</title><style>
                body { background-color: #1a202c; color: #ffffff; font-family: "Fira Code", "Cascadia Code", "Consolas", "Monaco", "monospace", sans-serif; }
                table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                th, td { padding: 8px; border: 1px solid #4a5568; text-align: left; }
                th { background-color: #2d3748; }
            </style></head><body>';
            echo '<table border="1" style="width:100%; border-collapse: collapse;">';
            echo '<thead><tr><th style="padding: 8px; border: 1px solid #4a5568; text-align: left; background-color: #2d3748;">Comando</th><th style="padding: 8px; border: 1px solid #4a5568; text-align: left; background-color: #2d3748;">Estado</th></tr></thead>';
            echo '<tbody>';
            if (ob_get_level() == 0) ob_start();

            $maintenance = ($option == "cache") ? [
                'Flush' => 'cache:flush',
            ] : [
                'Clear All Compiled' => 'optimize:clear',
                'Clear Application Cache' => 'cache:clear',
                'Recreate Storage Link' => 'storage:link',
                'Cache Configuration' => 'config:cache',
                'Cache Routes' => 'route:cache',
                'Cache Views' => 'view:cache',
            ];

            if ($option == 'prod') {
                set_time_limit(0); // Lift time limit for composer install
                $maintenance = array_merge(['Composer Install for PROD' => 'composer install --optimize-autoloader --no-dev'], $maintenance);
            }

            foreach ($maintenance as $key => $value) {
                echo '<tr><td style="padding: 8px; border: 1px solid #ddd;">' . htmlspecialchars($key) . '</td><td style="padding: 8px; border: 1px solid #ddd;">';
                ob_flush();
                flush();

                try {
                    Artisan::call($value);
                    echo '✔️';
                } catch (\Exception $e) {
                    echo '❌ ' . htmlspecialchars($e->getMessage());
                }
                echo '</td></tr>';
                ob_flush();
                flush();
            }

            echo '</tbody></table>';
            echo '</body></html>';
            ob_end_flush();
        });

        $response->headers->set('Content-Type', 'text/html');
        $response->headers->set('X-Accel-Buffering', 'no');

        return $response;
    }
}
