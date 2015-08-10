<?php
/**
 * @author Maxim Sokolovsky <sokolovsky@worksolutions.ru>
 */

class File {
    private $path;

    /**
     * @param $path
     */
    public function __construct($path) {
        $this->path = $path;
    }

    /**
     * Return content from file
     * @return string
     */
    public function getContent() {
        return file_get_contents($this->path);
    }

    /**
     * Clear file
     */
    public function clear() {
        $f = fopen($this->path, 'w');
        fclose($f);
    }

    /**
     * Put content into end file
     * @param $content
     */
    public function putToEnd($content) {
        $f = fopen($this->path, 'a');
        fwrite($f, $content);
        fclose($f);
    }
}
