<?php
    class Item
    {
        protected string $id;
        protected string $name;
        protected int $price;
        protected string $currency;
        protected string $description;
        protected array $tags;
        protected string $imagesDir;
        protected array $images;
    
        public function __construct(
            string $id,
            string $name,
            int $price = 0,
            string $currency = "HUF",
            string $description = "",
            array $tags = []
        ) {
            $this->id = $id;
            $this->name = $name;
            $this->price = $price;
            $this->currency = $currency;
            $this->description = $description;
            $this->tags = $tags;
            $this->imagesDir = "items/{$this->id}/images";
            $this->images = $this->getImages();
        }

        protected function getImages(): array {
            if (file_exists($this->imagesDir)) {
                return array_values(
                    array_diff(
                        scandir("items/{$this->id}/images"), [".", ".."]));
            } else {
                return [];
            }
        }

        public function renderCard(): string {
            $card = "<div class=\"col col-lg-3\">";

            $card .= "<div class=\"card text-white bg-dark mb-3\">";

            $card .= "<h5 class=\"card-header\">{$this->name}</h5>";

            if (count($this->images) > 0) {
                $card .= "<img src=\"{$this->imagesDir}/{$this->images[0]}\" class=\"card-img-top rounded-0\" alt=\"{$this->name}\">";
            }

            $card .= "<div class=\"card-body\">";
            $card .= "<p class=\"card-text\">{$this->description}</p>";
            $card .= "</div>";

            if (count($this->images) > 0 or count($this->tags) > 0) {
                $card .= "<ul class=\"list-group list-group-flush\">";

                if (count($this->images) > 0) {
                    $card .= "<li class=\"list-group-item bg-dark\">";
                    foreach ($this->images as $image) {
                        $card .= "<a href=\"{$this->imagesDir}/{$image}\" class=\"glightbox text-decoration-none\" data-gallery=\"{$this->id}\">";
                        $card .= "<img src=\"{$this->imagesDir}/{$image}\" class=\"img-thumbnail\" alt=\"{$this->name}\">&nbsp;";
                        $card .= "</a>";
                    }
                    $card .= "</li>";
                }

                if (count($this->tags) > 0) {
                    $card .= "<li class=\"list-group-item bg-dark tags\">";
                    foreach ($this->tags as $tag) {
                        $card .= "<span class=\"badge bg-primary\">{$tag}</span>&nbsp;";
                    }
                    $card .= "</li>";
                }

                $card .= "</ul>";
            }
            $card .= "<div class=\"card-footer fw-bold\">{$this->price}.- {$this->currency}</div>";

            $card .= "</div>";

            $card .= "</div>";

            return $card;
        }
    }
?>
