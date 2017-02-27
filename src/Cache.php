<?php
namespace NewDay\Caching;

class Cache
{
	private $secondsForExpire;

	private $cachiFile;

	private $updateUri;
	 
	public function __construct($time, $updateUri, $cachingFile)
	{
		$this->setTime($time);
		$this->updateUri($updateUri);
		$this->setCaching($cachingFile);
	}

	public function setTime($time)
	{
		$this->secondsForExpire = $time;
	}

	public function updateUri($uri)
	{
		$this->updateUri = $uri;
	}

	public function setCaching($cachingFile)
	{
		$this->cachiFile = $cachingFile;
	}

	public function optimize(){

		if (file_exists($this->cachiFile) 
			&& (filemtime($this->cachiFile) > time() - $this->secondsForExpire)
			) {

			$content = file_get_contents($this->cachiFile);

		} else {
			$content = file_get_contents($this->updateUri);
			file_put_contents($this->cachiFile, $content);
		}

		return  $content;
	} 
	
}