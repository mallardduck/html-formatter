<?php

namespace Navindex\HtmlFormatter;

use Illuminate\Config\Repository;

class Config extends Repository
{

    /**
     * @param array<string, mixed> $mergeConfig
     *
     * @return $this
     */
    public function merge(array $mergeConfig): Config
    {
        $this->items = array_merge_recursive($this->items, $mergeConfig);
        return $this;
    }

    public function split(string $string): Config
    {
        return new self($this->get($string) ?? []);
    }
}
