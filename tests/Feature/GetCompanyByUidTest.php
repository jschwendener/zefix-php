<?php

it('gets company details by UID', function () {
    $result = zefix()->company()->getByUid('CHE-110.088.994');

    expect($result->name)->toBe('Microsoft Schweiz GmbH');
});