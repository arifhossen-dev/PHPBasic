<?php

use Core\Validator;

it("validate a string", function () {
  $result = Validator::string("foobar");

  expect($result)->toBeTrue();
});