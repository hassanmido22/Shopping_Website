<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\Client as GuzzleClient;
use Jenssegers\Agent\Agent;

use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
        
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getcrawler()
    {
        $agent = new Agent();
        $agent->setUserAgent('Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36');

        $collectionTitle = collect();
        $collectionPrice = collect();
        $collectionImg = collect();
        $collectionLink = collect();
        $client= new Client();
        $GuzzleClient = new GuzzleClient(['verify' => false]);
        $client->setClient($GuzzleClient);
        $res = $client->request('GET','https://fashion.souq.com/eg-en/new-arrivals-men/c/8830?q=eyJzIjoibnIiLCJmIjpbXX0%3D');
        $first = $res->evaluate("count(//div[@class='overlay'])");
        
        for($i=3; $i<$first[0] ;$i++)
        {
            $title = $res->filterXPath('//div[@class="row collapse content medium-up-3"]//div[position()='.$i.']//span[@class="itemTitle"]/a');
            $price = $res->filterXPath('//div[@class="row collapse content medium-up-3"]//div[position()='.$i.']//h5/span');
            $img = $res->filterXPath('//div[@class="row collapse content medium-up-3"]//div[position()='.$i.']//div[@class="img-bucket"]//img');
            $link = $res->filterXPath('//div[@class="row collapse content medium-up-3"]//div[position()='.$i.']//div[@class="img-bucket"]/a');
            $collectionTitle->push($title->text());
            $collectionPrice->push($price->text());
            $collectionImg->push($img->attr('data-src'));
            $collectionLink->push($link->attr('href'));
        }
        return view('otherOnlineShops',compact('collectionTitle','collectionPrice','collectionImg','collectionLink'));

        
    }
    
}
