<?php

namespace App\Http\Controllers;

use http\Url;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $host = \request()->getHttpHost();
        $xml = new \DOMDocument('1.0');
        $xml->formatOutput = true;
        $urlset = $xml->createElement('urlset');
        $xml->appendChild($urlset);

        $url = $xml->createElement('url');
        $urlset->appendChild($url);

        $loc = $xml->createElement('loc',$host);
        $url->appendChild($loc);

        $changefreq=$xml->createElement('changefreq','yearly');
        $url->appendChild($changefreq);

        $priority=$xml->createElement('priority',1);
        $url->appendChild($priority);

        $url = $xml->createElement('url');
        $urlset->appendChild($url);

        $loc = $xml->createElement('loc',url('/').'/blog');
        $url->appendChild($loc);


        $changefreq=$xml->createElement('changefreq','yearly');
        $url->appendChild($changefreq);

        $priority=$xml->createElement('priority',1);
        $url->appendChild($priority);

        return "<xmp>".$xml->saveXML()."</xmp>";
    }
}
