<?php

class makeBibtex {
	private $url = '';
	private $dir = 'Bibtex'; //directory to place bib files
	private $filename = '';
	
	public function __construct() {
		// do nothing
	}
	
	public function makeBibFile($genre, $title, $journal, $year, $volume, $issue, $spage, $epage, $authors) {
		if(!file_exists($dir)) {
			mkdir ($this->dir, 0777);
		}

 		$bibtexString = '@'.$genre.' { ' .str_replace(' ', '-', $title). ', title = "'.$title.'", author = "'.trim($authors).'", year = "'.$year.'", volume = "'.$volume.'", issue = "'.$issue.'", pages = "'.$spage.'-'.$epage.'" }';
		$tempTitle = str_replace(' ', '_', $title);
		$this->filename = $tempTitle.'.bib';
		
		file_put_contents ($this->dir.'/'.$this->filename, $bibtexString);
	}
	
	public function returnUrl() {
		$this->url = $this->dir.'/'.$this->filename;
		
		return $this->url;
	}
}
?>
