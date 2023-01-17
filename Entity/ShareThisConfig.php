<?php

namespace Plugin\ShareThis\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Entity\AbstractEntity;

/**
 * @ORM\Table(name="plg_jinber_share_this_config")
 * @ORM\Entity(repositoryClass="Plugin\ShareThis\Repository\ShareThisConfigRepository")
 */
class ShareThisConfig extends AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", options={"unsigned":true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(name="property_id",type="string",length=25)
     * @var string
     */
    private $propertyId;

    /**
     * @ORM\Column(name="display_inline",type="boolean",nullable=true)
     * @var boolean
     */
    private $displayInline=false;
    /**
     * @ORM\Column(name="inline_selector",type="string",nullable=true)
     * @var string|null
     */
    private $inlineSelector='.ec-productRole__title';

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPropertyId(): string
    {
        return $this->propertyId;
    }

    /**
     * @param string $propertyId
     * @return ShareThisConfig
     */
    public function setPropertyId(string $propertyId): self
    {
        $this->propertyId = $propertyId;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDisplayInline(): bool
    {
        return $this->displayInline;
    }

    /**
     * @param bool $displayInline
     * @return ShareThisConfig
     */
    public function setDisplayInline(bool $displayInline): self
    {
        $this->displayInline = $displayInline;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInlineSelector(): ?string
    {
        return $this->inlineSelector;
    }

    /**
     * @param string|null $inlineSelector
     * @return ShareThisConfig
     */
    public function setInlineSelector(?string $inlineSelector): self
    {
        $this->inlineSelector = $inlineSelector;
        return $this;
    }
}