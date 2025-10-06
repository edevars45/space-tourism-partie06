<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class RoutesTest extends TestCase
{
    #[Test]
    public function la_page_d_accueil_est_accessible()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        // On cherche "L’ESPACE" (le grand titre affiché sur la page d'accueil)
        $response->assertSee('L’ESPACE');
    }

    #[Test]
    public function la_page_des_destinations_redirige_ou_est_accessible()
    {
        $response = $this->get('/destinations');
        // La page redirige (302) vers une planète spécifique → on accepte les deux cas
        $this->assertTrue(in_array($response->status(), [200, 302]));
    }

    #[Test]
    public function la_page_de_l_equipage_est_accessible()
    {
        $response = $this->get('/crew');
        $response->assertStatus(200);
        // Le mot exact dans le HTML est "ÉQUIPAGE"
        $response->assertSee('ÉQUIPAGE');
    }

    #[Test]
    public function la_page_technologie_est_accessible()
    {
        $response = $this->get('/technology');
        $response->assertStatus(200);
        // Le mot exact affiché est "TECHNOLOGIE"
        $response->assertSee('TECHNOLOGIE');
    }

    #[Test]
    public function la_commutation_de_langue_fr_redirige_correctement()
    {
        $response = $this->get('/lang/fr');
        $response->assertRedirect();
    }

    #[Test]
    public function la_commutation_de_langue_en_redirige_correctement()
    {
        $response = $this->get('/lang/en');
        $response->assertRedirect();
    }
}
