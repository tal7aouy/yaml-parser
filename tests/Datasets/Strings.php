<?php

declare(strict_types=1);

dataset('strings', function () {
    yield uniqid('test', true);
    yield uniqid('test', true);
    yield uniqid('test', true);
    yield uniqid('test', true);
});
