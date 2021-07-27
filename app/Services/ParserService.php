<?php
namespace App\Services;
use App\Contracts\ParserContract;
use App\Models\Category;
use App\Models\News;
use Illuminate\Database\Eloquent\Model;

class ParserService implements ParserContract
{
    public function getParsedMaterial(array $url): array
    {
        $url = $url['url'];
        $xml = \XmlParser::load($url);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses'  => 'channel.image.url'
            ],
            'news' => [
                'uses'  => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);

        return $data;
    }


    public function storeParsedMaterial(array $parsedMaterial): bool
    {

            if (!Category::where('name', '=', $parsedMaterial['title'])->first()) {
                $newCat = new Category();
                $newCat->fill(['name' => $parsedMaterial['title'],  'desc' => $parsedMaterial['description']]);
                if ($newCat->save()) {
                    $newCatID  = Category::select('id')->where('name',  '=', $parsedMaterial['title'])->first();
                    foreach ($parsedMaterial['news'] as  $singleNews) {
                        try {
                            if ($newCatID) {
                                $newNews = new News();
                                $newNews->fill(['title' => $singleNews['title'],'article' => 'Parsed  from Yandex', 'category_id' => $newCatID->id,'status_id' => 1, 'source' => $singleNews['link']]);
                                $newNews->save();
                            }
                        } catch (\Exception $exception)  {
                            die($exception->getMessage());
                        }
                    }
                }
            }

        return true;
    }
}
