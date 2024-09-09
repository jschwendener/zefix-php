<?php

use Jschwendener\Zefix\Zefix;
use Saloon\Http\Auth\BasicAuthenticator;

it('authenticates with basic auth', function () {
    $connector = new Zefix('username', 'password');
    $auth = $connector->getAuthenticator();

    expect($auth)->toBeInstanceOf(BasicAuthenticator::class);
    expect($auth->username)->toBe('username');
    expect($auth->password)->toBe('password');
});
