<?php

namespace EasyFeedReader\Domain\Feed;

use DateTime;

class FeedItem
{
    public $title;
    public $link;
    public $description;
    public $date;
    public $category;

    public function __construct(
        string $title,
        string $link,
        string $description,
        DateTime $date,
        ?string $category
    ) {
        $this->setTitle($title);
        $this->setLink($link);
        $this->setDescription($description);
        $this->setDate($date);
        $this->setCategory($category);
    }

    /**
     * @param mixed $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param mixed $link
     */
    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    /**
     * @param mixed $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param mixed $date
     */
    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @param string|null $category
     */
    public function setCategory(?string $category):void
    {
        $this->category = $category;
    }

    public function getTruncatedDescription(int $limit = 100):string
    {
        $withoutTags = strip_tags($this->description);
        if (strlen($withoutTags) <= $limit) {
            return $withoutTags;
        }
        $result = explode('\n', wordwrap($withoutTags, $limit, '...\n'));
        return $result[0];
    }
}
