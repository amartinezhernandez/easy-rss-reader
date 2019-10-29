<?php

namespace EasyFeedReader\Domain\Feed;

use DateTime;

class FeedItemFactory
{
    public static function fromSimpleXML($data)
    {
        return new FeedItem(
            $data->title,
            $data->link,
            $data->description,
            (new DateTime())->setTimestamp(strtotime($data->pubDate)),
            $data->category
        );
    }
}