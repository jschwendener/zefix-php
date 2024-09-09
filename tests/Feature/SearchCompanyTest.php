<?php

it('searches for a company', function () {
    $results = zefix()->company()->search('Microsoft Schweiz GmbH');
    
    expect($results)->toBeArray();
    expect($results[0]->uid)->toBe('CHE110088994');
});