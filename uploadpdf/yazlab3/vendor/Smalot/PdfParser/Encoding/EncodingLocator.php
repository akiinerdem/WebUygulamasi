<?php

namespace Smalot\PdfParser\Encoding;

abstract class AbstractEncoding
{
    abstract public function getTranslations(): array;
}

class EncodingLocator
{
    protected static $encodings;

    public static function getEncoding(string $encodingClassName): AbstractEncoding
    {
        if (!isset(self::$encodings[$encodingClassName])) {
            self::$encodings[$encodingClassName] = new $encodingClassName();
        }

        return self::$encodings[$encodingClassName];
    }
}