<?php 
class comment {
    private ?int $id = null;
    private int $post_id;
    private string $content;
    private string $date_added;

    public function __construct($content) {
        $this->content = $content;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getPostId(): int {
        return $this->post_id;
    }

    public function getContent(): string {
        return $this->content;
    }

    public function getDateAdded(): string {
        return $this->date_added;
    }

    public function affichage() {
        // Méthode pour afficher les détails du commentaire
    }
}
?>