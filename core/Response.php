<?php

class Response
{
    protected $httpStatusCode = '200';
    protected $httpStatusText = 'OK';

    protected $content = '';
    protected $contentType = 'text/html';

    public function __construct($content = '', $httpStatusCode = '200', $httpStatusText = 'OK')
    {
        $this->content = $content;
        $this->httpStatusCode = $httpStatusCode;
        $this->httpStatusText = $httpStatusText;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setStatus($httpStatusCode, $httpStatusText)
    {
        $this->httpStatusCode = $httpStatusCode;
        $this->httpStatusText = $httpStatusText;
    }

    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
    }

    public function send()
    {
        $this->sendHeaders();
        $this->sendContent();
    }

    protected function sendHeaders()
    {
        header(sprintf('HTTP/1.1 %s %s', $this->httpStatusCode, $this->httpStatusText));
        header(sprintf('Content-type: %s', $this->contentType));

        if ($this->httpStatusCode === "301") {
            header(sprintf('Location: %s', $this->content));
        }

    }

    protected function sendContent()
    {
        echo $this->content;
    }



}