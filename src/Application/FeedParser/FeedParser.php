<?php

namespace EasyFeedReader\Application\FeedParser;

use EasyFeedReader\Domain\Feed\Feed;
use EasyFeedReader\Domain\Feed\FeedItemFactory;

class FeedParser
{
    public static function parse($url)
    {
        $feed = file_get_contents($url);
        $xml = simplexml_load_string($feed);

        $items = [];

        foreach ($xml->channel->item as $item) {
            $items[] = FeedItemFactory::fromSimpleXML($item);
        }

        return new Feed(
            $xml->channel->title,
            $xml->channel->link,
            $xml->channel->description,
            $items
        );
    }
}
