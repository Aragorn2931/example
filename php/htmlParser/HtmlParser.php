<?php

include_once './Contracts/ParserInterface.php';

class HtmlParser implements ParserInterface
{
    private $content;

    /**
     * Upload content
     *
     * @param string $url
     * @throws Exception
     */
    public function load(string $url): void
    {
        $this->content = file_get_contents($url);

        if (!$this->content) {
            throw new Exception('Has no content');
        }

    }

    /**
     * Parse uploaded content
     * @return array
     */
    public function parse(): array
    {
        preg_match_all('/(?:<)(?!\/)(\w+)(?:\s?[^>]+)>/', $this->content, $matches);

        return $matches[1];
    }

    /**
     * Get all of used html tags and their amount
     *
     * @param array $matches
     * @return array
     */
    public function getAllHtmlTags(array $matches): array
    {
        $length = count($matches);
        $amountArray = array();

        for ($i = 0; $i < $length - 1; $i++) {
            $amountArray[$matches[$i]] = 0;
        }

        for ($i = 0; $i < $length - 1; $i++) {
            $amountArray[$matches[$i]] += 1;
        }

        return $amountArray;
    }
}
