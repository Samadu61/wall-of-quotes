<?php

namespace WallOfQuotes\Bundle\AppBundle\Entity;

use DateTimeInterface;

class Quote implements QuoteInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $nickNameAuthor;

    /**
     * @var AuthorInterface
     */
    private $author;

    /**
     * @var DateTimeInterface
     */
    private $date;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param null|string $text
     */
    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return null|string
     */
    public function getNickNameAuthor(): ?string
    {
        return $this->nickNameAuthor;
    }

    /**
     * @param null|string $nickNameAuthor
     */
    public function setNickNameAuthor(?string $nickNameAuthor): void
    {
        $this->nickNameAuthor = $nickNameAuthor;
    }

    /**
     * @return null|AuthorInterface
     */
    public function getAuthor(): ?AuthorInterface
    {
        return $this->author;
    }

    /**
     * @param null|AuthorInterface $author
     */
    public function setAuthor(?AuthorInterface $author): void
    {
        $this->author = $author;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface|null $date
     */
    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }
}