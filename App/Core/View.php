<?php
declare(strict_types=1);

namespace App\Core;

final class View
{
    public static function render(string $template, array $data = []): string
    {
        $viewsDir = dirname(__DIR__) . '/../views';
        $viewFile = $viewsDir . '/' . $template . '.php';
        $layout = $viewsDir . '/' . '/layout.php';

        if (!file_exists($viewFile)) {
            return "View introuvable: {$template}";
        }

        $role = $_SESSION['user']['role'] ?? null;
        $header = 'header-default';
        $footer = 'footer-default';

        if ($role === 'admin') {
            $header = 'header-admin';
            $footer = 'footer-user';
        } elseif ($role === 'user') {
            $header = 'header-user';
            $footer = 'footer-user';
        } elseif ($role === 'hero') {
            $header = 'header-hero';
            $footer = 'footer-user';
        }

        $data['headerPath'] = $viewsDir . '/includes' . $header . '.php';
        $data['footerPath'] = $viewsDir . '/includes' . $footer . '.php';

        extract($data, EXTR_SKIP);

        ob_start();
        if (file_exists($layout)) {
            $view = $viewFile;
            require $layout;
        } else {
            require $viewFile;
        }
        return (string)ob_get_clean();
    }
}
