<?php

namespace WallOfQuotes\Bundle\AppBundle\Entity;

use DateTimeInterface;

interface QuoteInterface
{
    /**
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * @return null|string
     */
    public function getText(): ?string;

    /**
     * @param null|string $text
     */
    public function setText(?string $text): void;

    /**
     * @return null|string
     */
    public function getNickNameAuthor(): ?string;

    /**
     * @param null|string $nickNameAuthor
     */
    public function setNickNameAuthor(?string $nickNameAuthor): void;

    /**
     * @return null|AuthorInterface
     */
    public function getAuthor(): ?AuthorInterface;

    /**
     * @param null|AuthorInterface $author
     */
    public function setAuthor(?AuthorInterface $author): void;

    /**
     * @return DateTimeInterface|null
     */
    public function getDate(): ?DateTimeInterface;

    /**
     * @param DateTimeInterface|null $date
     */
    public function setDate(?DateTimeInterface $date): void;

    /**
     * @return DateTimeInterface|null
     */
    public function getCreatedAt(): ?DateTimeInterface;

    /**
     * @param DateTimeInterface|null $createdAt
     */
    public function setCreatedAt(?DateTimeInterface $createdAt): void;

    /**
     * @return DateTimeInterface|null
     */
    public function getUpdatedAt(): ?DateTimeInterface;

    /**
     * @param DateTimeInterface|null $updatedAt
     */
    public function setUpdatedAt(?DateTimeInterface $updatedAt): void;
}
