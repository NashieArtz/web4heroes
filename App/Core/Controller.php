<?php
declare(strict_types=1);

namespace App\Core;

abstract class Controller
{
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    protected function view(string $template, array $data = [], int $status = 200): Response
    {
        $html = View::render($template, $data);
        return new Response($html, $status);
    }
    protected function redirect(string $to, int $status = 200): Response
    {
        return new Response('', $status, ['Location' => $to]);
    }

    protected function roleCheck(string $role): string {
        return match ($role) {
            'admin' => 'admin',
            'user' => 'user',
            'hero' => 'hero',
            default => null
        };
    }

}
