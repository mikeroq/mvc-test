<?php

namespace Core;

use Aura\Session\Segment;
use Aura\Session\SessionFactory;

class Session
{
    protected \Aura\Session\Session $session;
    protected Segment $segment;

    public function __construct()
    {
        $sessionFactory = new SessionFactory();
        $this->session = $sessionFactory->newInstance($_COOKIE);
        $this->segment = $this->session->getSegment('biscy\Application');
    }

    public function get(string $key): mixed
    {
        return $this->segment->get($key);
    }

    public function has(string $key): bool
    {
        return $this->get($key) !== null;
    }

    public function missing(string $key): bool
    {
        return $this->get($key) === null;
    }

    public function put(string $key, mixed $value): void
    {
        $this->segment->set($key, $value);
    }

    public function forget(string $key): void
    {
        $this->segment->set($key, null);
    }

    public function pull(string $key): mixed
    {
        $value = $this->get($key);
        $this->forget($key);
        return $value;
    }

    public function flush(): void
    {
        $this->segment->clear();
    }

    public function regenerate(): void
    {
        $this->session->regenerateId();
    }

    public function invalidate(): void
    {
        $this->session->regenerateId();
        $this->session->clear();
    }

    public function flash(string $key, mixed $value): void
    {
        $this->segment->setFlash($key, $value);
    }

    public function now(string $key, mixed $value): void
    {
        $this->segment->setFlashNow($key, $value);
    }

    public function reflash(): void
    {
        $this->segment->keepFlash();
    }

    public function getCsrfToken(): string
    {
        return $this->session->getCsrfToken()->getValue();
    }

    public function checkCsrfIsValid($token): bool
    {
        return $this->session->getCsrfToken()->isValid($token);
    }
}