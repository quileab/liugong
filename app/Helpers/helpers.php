<?php

if (! function_exists('inline_svg')) {
    function inline_svg(string $path, string $class = ''): string
    {
        $fullPath = base_path('public/' . $path);
        $fullPath = str_replace('\\', '/', $fullPath); // Ensure forward slashes

        if (!file_exists($fullPath)) {
            return ''; // Or handle the error as you see fit
        }

        $svgContent = file_get_contents($fullPath);

        // Add the class attribute to the <svg> tag
        if (!empty($class)) {
            $svgContent = str_replace('<svg', '<svg class="' . $class . '"', $svgContent);
        }

        return $svgContent;
    }
}