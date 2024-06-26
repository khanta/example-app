<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testSuccessfulLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();      // テスト用のユーザーを作成する
            $browser->visit('/login')
                    ->type('email', $user->email)   // テスト用のユーザーのメールアドレスを指定する
                    ->type('password', 'password')  // パスワードを入力する　※デフォで'password'で作られるらしい
                    ->press('LOG IN')               // 「LOG IN」ボタンをクリックする
                    ->assertPathIs('/tweet')        // /tweet に遷移したことを確認する
                    ->assertSee('つぶやきアプリ');
        });
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
    }
}
