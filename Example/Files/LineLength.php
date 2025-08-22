<?php

declare(strict_types = 1);

namespace Example\Files;

final class LineLength
{

    public function exampleWithProperlySplitLine(): void
    {
        // Correct way - long line is split into multiple lines
        $message = 'This text is very long, but is properly split into multiple lines.';

        echo $message;
    }

    public function exampleWithLongString(): void
    {
        // Correct way - using nowdoc for long texts
        $template = <<<'HTML'
            <div class="container">
                <h1>Very long page title that would normally exceed the line length limit</h1>
                <p>Long page content text can be arranged using nowdoc syntax for better readability.</p>
            </div>
            HTML;

        echo $template;
    }

    public function exampleWithLongMethodCall(): void
    {
        // Correct way - splitting long method calls
        $result = $this->getSomeData()
            ->processData()
            ->validateData()
            ->transformData()
            ->getResult();

        echo $result;
    }

    private function getSomeData(): self
    {
        return $this;
    }

    private function processData(): self
    {
        return $this;
    }

    private function validateData(): self
    {
        return $this;
    }

    private function transformData(): self
    {
        return $this;
    }

    private function getResult(): string
    {
        return 'processed data';
    }

}