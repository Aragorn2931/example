<?php


interface ParserInterface
{
    /**
     * Upload content
     *
     * @param string $url
     */
    public function load(string $url): void;

    /**
     * Parse uploaded content
     *
     * @return array
     */
    public function parse(): array;

    /**
     * Get all of used html tags and their amount
     *
     * @param array $matches
     * @return array
     */
    public function getAllHtmlTags(array $matches): array;
}
