<?php
namespace App\Parser;

use Symfony\Component\DomCrawler\Crawler;
use App\Parser\ParseContract;
use App\Product;
use App\Category;
use App\CatalogOnliner;
use Auth;

class Onliner implements ParseContract
{
    use ParseTrait;
    public $str = '';
    public $url = '';
    public $obj;
    public $char;
    public $crawler;
    public $id;

    public function __construct()
    {
        $file = file_get_contents('http://catalog.onliner.by/');
        $this->crawler = new Crawler($file);
    }

    public function getParse($data)
    {
        $divo = explode('/', $data->url);
        $end = end($divo);
        $pos = str_ireplace('http://catalog.onliner.by/', '', $data->url);
        $ask = strpos($pos, '?');
        if ($ask === false) {
            $vopros = '?';
        } else {
            $vopros = '&';
        }
        $http = 'https://catalog.api.onliner.by/search/' . $end . $vopros . 'page=1';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $http);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        $ke = 0;
        $data_arr = (array)json_decode($result);
        $cat = CatalogOnliner::where('name', $data->name)->first();
        $prod = Product::where('cat_id', $cat->id)->first();
        if (!is_null($prod)) {
            $prod->delete();
        }
        foreach ($data_arr as $key => $value) {
            if (is_array($value)) {

                foreach ($value as $val_key => $data_value) {
                    $val_value = (array)$data_value;
                    $site_id = (isset($val_value['id'])) ? $val_value['id'] : '';
                    $site_key = (isset($val_value['key'])) ? $val_value['key'] : '';
                    $name = (isset($val_value['full_name'])) ? $val_value['full_name'] : '';
                    $pic_value = (array)$val_value['images'];
                    $header_picture = (isset($pic_value['header'])) ? $pic_value['header'] : '';
                    $icon_picture = (isset($pic_value['icon'])) ? $pic_value['icon'] : '';
                    $description = (isset($val_value['description'])) ? $val_value['description'] : '';
                    $site_product_url = (isset($val_value['html_url'])) ? $val_value['html_url'] : '';
                    $rev_value = (array)$val_value['reviews'];
                    $rating = (isset($rev_value['rating'])) ? (integer)$rev_value['rating'] : '';
                    $site_reviews_url = (isset($rev_value['html_url'])) ? $rev_value['html_url'] : '';
                    $price_value = (array)$val_value['prices'];
                    $price_min = (isset($price_value['min'])) ? $price_value['min'] : '';
                    $price_max = (isset($price_value['max'])) ? $price_value['max'] : '';
                    $site_prices_url = (isset($price_value['html_url'])) ? $price_value['html_url'] : '';
                    $currency = (isset($price_value['currency_sign'])) ? $price_value['currency_sign'] : '';
                    $forum_value = (array)$val_value['forum'];
                    $site_forum_url = (isset($forum_value['topic_url'])) ? $forum_value['topic_url'] : '';
                    $site_api_url = (isset($val_value['url'])) ? $val_value['url'] : '';
                    //получаем характеристики товара
                    $this->setCharacter($site_product_url, ".product-specs__table");
                    $character = $this->getCharacter();
                    //добавляем товар в базу данных
                    $prod = new Product();
                    $prod->cat_id = (isset($cat->id)) ? $cat->id : 0;
                    $prod->site = 'onliner.by';
                    $prod->site_product_id = $site_id;
                    $prod->site_key = $site_key;
                    $prod->name = $name;
                    $prod->header_picture = $header_picture;
                    $prod->icon_picture = $icon_picture;
                    $prod->description = $description;
                    $prod->site_product_url = $site_product_url;
                    $prod->site_reviews_url = $site_reviews_url;
                    $prod->rating = $rating;
                    $prod->count = 1;
                    $prod->price_min = $price_min;
                    $prod->price_max = $price_max;
                    $prod->site_prices_url = $site_prices_url;
                    $prod->currency = $currency;
                    $prod->site_forum_url = $site_forum_url;
                    $prod->site_api_url = $site_api_url;
                    $prod->character = $character;
                    $prod->user_id = Auth::user()->id;
                    $prod->save();

                    sleep(1);
                    $ke++;
                }
            }
        }
        $body = $ke . " товаров";


        return $body;
    }


    public function catalog()
    {
        $arr = [];
        $this->crawler->filter(".catalog-navigation-classifier__item")->each(function (Crawler $node, $i) {
            $id = ($node->attr('data-id') != null) ? $node->attr('data-id') : 0;
            $cat = CatalogOnliner::firstOrNew(['id' => $id]);
            $cat->name = $node->filter('.catalog-navigation-classifier__item-title-wrapper')->text();
            $cat->type = 'link';
            $cat->parent_id = 0;
            $cat->save();
        });
        return $arr;
    }

    public function setCharacter($path, $selector)
    {
        $file = file_get_contents($path);
        $crawler = new Crawler($file);
        $table = $this->html($crawler, $selector);
        $this->char = $table;
        return true;
    }

    public function h2Catalog()
    {
        $parent = CatalogOnliner::all();
        foreach ($parent as $one) {
            $this->id = $one->id;
            $this->crawler->filter(".catalog-navigation-list__category[data-id=" . $one->id . "]")->each(function (Crawler $node, $i) {
                $node->filter('.catalog-navigation-list__group-title')->each(function (Crawler $node, $i) {
                    //echo $node->text();
                    $cat = new CatalogOnliner;
                    $cat->name = $node->text();
                    $cat->parent_id = $this->id;
                    $cat->type = 'h2';
                    $cat->save();
                });

            });
        }
    }

    public function listCatalog()
    {
        $parent = CatalogOnliner::all();
        foreach ($parent as $one) {
            $this->id = $one->id;
            $this->crawler->filter(".catalog-navigation-list__category[data-id=" . $one->id . "]")->each(function (Crawler $node, $i) {
                $node->filter('.catalog-navigation-list__group')->each(function (Crawler $node, $i) {
                    $cat = new CatalogOnliner;
                    $cat->name = $node->filter('.catalog-navigation-list__group-title')->text();
                    $cat->category_type = 'h2';
                    $cat->parent_id = $this->id;
                    $cat->type = 'h2';
                    //$cat->save();

                    $node->filter('.catalog-navigation-list__link-inner a')->each(function (Crawler $node, $i) {
                        $cat = new CatalogOnliner;
                        $cat->name = $node->text();
                        $cat->url = $node->attr('href');
                        $cat->parent_id = $this->id;
                        $cat->type = '';
                        //$cat->save();
                    });
                });

            });
        }


    }

    public function getCharacter()
    {
        return $this->char;
    }
}
