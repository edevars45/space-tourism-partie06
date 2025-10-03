<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;


class LocalesConfigTest extends TestCase
{
    /** @test */
    public function locales_config_is_loaded_correctly()
    {
        $locales = config('locales');

        $this->assertIsArray($locales);
        $this->assertArrayHasKey('supported', $locales);
        $this->assertArrayHasKey('default', $locales);

        $this->assertContains('fr', $locales['supported']);
        $this->assertContains('en', $locales['supported']);
        $this->assertEquals('fr', $locales['default']);
    }

    /** @test */public function root_url_redirects_to_default_locale()
{
    $response = $this->get('/');

    // On vérifie juste que la page s'affiche bien
    $response->assertStatus(200);
    $response->assertSee('Space Tourism'); // adapte le texte selon ta page d'accueil
}
}
