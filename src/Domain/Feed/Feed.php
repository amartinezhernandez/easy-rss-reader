<?php

namespace EasyFeedReader\Domain\Feed;

use Doctrine\Common\Collections\ArrayCollection;

class Feed
{
    public $title;
    public $link;
    public $description;
    public $items;

    public function __construct(
        string $title,
        string $link,
        ?string $description,
        array $items
    ) {
        $this->setTitle($title);
        $this->setLink($link);
        $this->setDescription($description);
        $this->setItems($items);
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string $link
     */
    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items): void
    {
        $this->items = new ArrayCollection($items);
    }
}
