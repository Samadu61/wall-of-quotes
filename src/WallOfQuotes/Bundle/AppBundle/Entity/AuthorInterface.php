<?php

namespace WallOfQuotes\Bundle\AppBundle\Entity;

interface AuthorInterface
{
    /**
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * @return null|string
     */
    public function getName(): ?string;

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void;
}