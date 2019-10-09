<?php

include_once './HtmlParser.php';

const URL = 'http://habr.com';

class Parser implements ParserInterface
{
    /** @var HtmlParser $parser */
    private $parser;
    private $content;

    /**
     * Parser constructor.
     * @param ParserInterface $parser
     */
    public function __construct(ParserInterface $parser)
    {
        $this->content = $this->parser = $parser;
    }


    /**
     * Upload content
     *
     * @param string $url
     * @throws Exception
     */
    public function load(string $url): void
    {
        $this->parser->load($url);
    }

    /**
     * Parse uploaded content
     *
     * @return array
     */
    public function parse(): array
    {
        return $this->parser->parse();
    }


    /**
     * Get all of used html tags and their amount
     *
     * @param array $matches
     * @return array
     */
    public function getAllHtmlTags(array $matches): array
    {
        return $this->parser->getAllHtmlTags($matches);
    }
}


$parser = new Parser(new HtmlParser());

/** @var HtmlParser $parser  */
$parser->load(URL);
$matches = $parser->parse();
print_r($parser->getAllHtmlTags($matches));
