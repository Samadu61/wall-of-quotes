<?php

namespace WallOfQuotes\Bundle\AppBundle\Entity;

use DateTimeInterface;

interface QuoteInterface
{
    public function getId(): ?int;

    public function getText(): ?string;

    public function setText(?string $text): void;

    public function getNickNameAuthor(): ?string;

    public function setNickNameAuthor(?string $nickNameAuthor): void;

    public function getAuthor(): ?AuthorInterface;

    public function setAuthor(?AuthorInterface $author): void;

    public function getDate(): ?DateTimeInterface;

    public function setDate(?DateTimeInterface $date): void;
}