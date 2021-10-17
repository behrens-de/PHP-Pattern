<?php
// Iterator Pattern 
// Erstellen einer Klasse mit dem Iterator Pattern

class Filmliste implements Iterator
{
    private $_filme = [];
    private $_position = 0;

    public function neuerFilm(Film $film)
    {
        $this->_filme[] = $film;
    }

    public function rewind()
    {
        // Setzt die Position wieder auf null
        $this->_position = 0;
    }

    public function key()
    {
        return $this->_position;
    }

    public function valid()
    {
        $filmAnzahl = count($this->_filme);
        if ($this->_position < $filmAnzahl ) {
            return true;
        } return false;
    }

    public function current()
    {
        return $this->_filme[$this->_position];
    }

    public function next()
    {
        $this->_position++;
    }
}

// Class für Filme die wir im Iterator Pattern verwenden
class Film{
    public function __construct(string $title, string $regisseur)
    {
        $this->title = $title;
        $this->regisseur = $regisseur;
    }
}
// Benutzer des Iterator Patterns

$filmliste = new Filmliste();
$filmliste->neuerFilm(new Film('Film1','Max Muster'));
$filmliste->neuerFilm(new Film('Film2','Max Muster'));
$filmliste->neuerFilm(new Film('Film3','Max Muster'));


foreach($filmliste as $film){
    printf('%s (%s)<br>',$film->title,$film->regisseur);
}