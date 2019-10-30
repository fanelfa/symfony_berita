<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KategoriRepository")
 */
class Kategori
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nama;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Berita", mappedBy="kategori", orphanRemoval=true)
     */
    private $berita;

    public function __construct()
    {
        $this->berita = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNama(): ?string
    {
        return $this->nama;
    }

    public function setNama(string $nama): self
    {
        $this->nama = $nama;

        return $this;
    }

    /**
     * @return Collection|Berita[]
     */
    public function getBerita(): Collection
    {
        return $this->berita;
    }

    public function addBeritum(Berita $beritum): self
    {
        if (!$this->berita->contains($beritum)) {
            $this->berita[] = $beritum;
            $beritum->setKategori($this);
        }

        return $this;
    }

    public function removeBeritum(Berita $beritum): self
    {
        if ($this->berita->contains($beritum)) {
            $this->berita->removeElement($beritum);
            // set the owning side to null (unless already changed)
            if ($beritum->getKategori() === $this) {
                $beritum->setKategori(null);
            }
        }

        return $this;
    }
}
