<?php

namespace App\Entity;

use App\Repository\FilesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File as HttpFoundationFile;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use App\Entity\Traits\TimestampableTrait;


#[ORM\Entity(repositoryClass: FilesRepository::class)]
#[Vich\Uploadable]
class File implements \Serializable
{
    use TimestampableTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Vich\UploadableField(mapping: '', fileNameProperty: 'file.name', size: 'file.size', mimeType: "file.mimeType", originalName: "file.originalName")]
    private ?HttpFoundationFile  $fileFile = null;

    #[ORM\Embedded(class: EmbeddedFile::class)]
    private ?EmbeddedFile $file = null;


    public function __construct()
    {
        $this->file = new EmbeddedFile();
        $this->created_at = new \DateTimeImmutable();
        $this->updated_at = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    /**
     * @param HttpFoundationFile|null $fileFile
     * @return void
     */
    public function setFileFile(?HttpFoundationFile  $fileFile = null): void
    {
        $this->fileFile = $fileFile;

        if (null !== $fileFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updated_at = new \DateTime();
        }
    }

    public function getFileFile(): ?HttpFoundationFile
    {
        return $this->fileFile;
    }

    public function getFile(): ?EmbeddedFile
    {
        return $this->file;
    }

    public function setFile(?EmbeddedFile $file): void
    {
        $this->file = $file;
    }

    public function serialize()
    {
        return serialize(array($this->getId()));
    }

    public function unserialize($serialized)
    {
        list($this->id) = unserialize($serialized);
    }
}
