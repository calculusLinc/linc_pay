<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;

use App\Repository\TransactionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransactionRepository::class)]
#[ApiResource()]
class Transaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $amount = null;

    #[ORM\ManyToOne(inversedBy: 'transactions')]
    private ?Client $client = null;

    #[ORM\ManyToOne(inversedBy: 'transactions')]
    private ?PaiementMethod $paiement_method = null;

    #[ORM\ManyToOne(inversedBy: 'transactions')]
    private ?TransactionActor $sender = null;

    #[ORM\ManyToOne(inversedBy: 'transactions')]
    private ?TransactionActor $receiver = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getPaiementMethod(): ?PaiementMethod
    {
        return $this->paiement_method;
    }

    public function setPaiementMethod(?PaiementMethod $paiement_method): self
    {
        $this->paiement_method = $paiement_method;

        return $this;
    }

    public function getSender(): ?TransactionActor
    {
        return $this->sender;
    }

    public function setSender(?TransactionActor $sender): self
    {
        $this->sender = $sender;

        return $this;
    }

    public function getReceiver(): ?TransactionActor
    {
        return $this->receiver;
    }

    public function setReceiver(?TransactionActor $receiver): self
    {
        $this->receiver = $receiver;

        return $this;
    }
}
