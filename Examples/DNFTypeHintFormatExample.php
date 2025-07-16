<?php

declare(strict_types = 1);

namespace Example;

final class DNFTypeHintFormatExample
{

    public function foo((A&B)|C $value): (A&B)|C
    {
        return $value;
    }

}

interface A {

}
interface B {

}
interface C {

} 