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
class Files implements \Serializable
{
    use TimestampableTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Vich\UploadableField(mapping: 'userAvatar', fileNameProperty: 'file.name', size: 'file.size', mimeType: "file.mimeType", originalName: "file.originalName")]
    private ?HttpFoundationFile  $fileFile = null;

    #[ORM\Embedded(class: EmbeddedFile::class)]
    private EmbeddedFile $file;

    /**
     * @var Collection<int, User>
     */
    #[ORM\OneToMany(targetEntity: User::class, mappedBy: 'avatar')]
    private Collection $users;

    public function __construct()
    {
        $this->file = new EmbeddedFile();
        $this->created_at = new \DateTimeImmutable();
        $this->updated_at = new \DateTimeImmutable();
        $this->users = new ArrayCollection();
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

    public function getFile(): ?EmbeddedFile
    {
        return $this->file;
    }

    public function setFile(EmbeddedFile $file): void
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

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setAvatar($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getAvatar() === $this) {
                $user->setAvatar(null);
            }
        }

        return $this;
    }
}
