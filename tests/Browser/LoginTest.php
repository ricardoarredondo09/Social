<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @test
     */
    public function registered_users_can_login()
    {
        factory(User::class)->create([
            'email' => 'ricard.arredondo@gmail.com'
        ]);
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'ricard.arredondo@gmail.com')
                    ->type('password', 'secret')
                    ->press('#login-btn')
                    ->assertPathIs('/')
                    ->assertAuthenticated()
                    ;
        });
    }
}
