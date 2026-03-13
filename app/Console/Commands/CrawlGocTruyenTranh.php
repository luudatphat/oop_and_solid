<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;


class CrawlGocTruyenTranh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:crawl-goc-truyen-tranh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = new Client();
        $defaultUrl = 'https://goctruyentranhvui21.com';
        $response = $client->get($defaultUrl . '/truyen/bac-thay-ung-bien');
        $html = $response->getBody()->getContents();

        $crawler = new Crawler($html);

        $imageAndTitle = $crawler->filter('.v-image.mx-auto.responsive.rounded.ele-2.theme-dark img')
            ->each(function ($node) {
                $src = $node->attr('src');
                $title = $node->attr('title');

                return [
                    'src' => $src,
                    'title' => $title
                ];
            });

        $description = $crawler->filter('.v-card-text.pt-1.px-4.pb-4.text-secondary.font-weight-medium')
            ->each(function ($node) {
                $text = $node->text();
                return $text;
            });

        $chapters = $crawler->filter('.chapter-info span')
            ->each(function ($node) {
                $text = $node->text();
                return $text;
            });

        $data = [
            'imageAndTitle' => $imageAndTitle,
            'description' => $description,
            'chapters' => $chapters
        ];

        dd($data);
    }
}



// curl 'https://goctruyentranhvui21.com/api/chapter/loadAll' \
//   -H 'accept: application/json, text/javascript, */*; q=0.01' \
//   -H 'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5' \
//   -H 'cache-control: no-cache' \
//   -H 'content-type: application/x-www-form-urlencoded; charset=UTF-8' \
//   -b 'X-TOKEN=M0Al80ofZtPkIbjXqvWljA; _ga=GA1.1.1478644664.1773327925; __PPU_cl_tl=zICCoWzSaWdzQqFjBw; __PPU_puid=16723073934351948806; __PPU_ppucnt=8; usid=468A9922320104DB5768E80DA5798D67; _ga_V1FSZ4YFJH=GS2.1.s1773327924$o1$g1$t1773332604$j3$l0$h0; bnState_2019937=%7B%22impressions%22%3A22%2C%22delayStarted%22%3A0%7D; UGVyc2lzdFN0b3JhZ2U=%7B%22CAIFRQ%22%3A%22ADqH9gAAAAAAAAACADis2wAAAAAAAAAN%22%2C%22CAIFRT%22%3A%22ADqH9gAAAABps5nQADis2wAAAABps5nQ%22%2C%22MTIFRQ%22%3A%22AEuBZgAAAAAAAAAN%22%2C%22MTIFRT%22%3A%22AEuBZgAAAABps5nQ%22%7D; bnState_1892937=%7B%22impressions%22%3A17%2C%22delayStarted%22%3A0%7D' \
//   -H 'origin: https://goctruyentranhvui21.com' \
//   -H 'pragma: no-cache' \
//   -H 'priority: u=1, i' \
//   -H 'referer: https://goctruyentranhvui21.com/truyen/sap-xuat-ngu-thi-isekai/chuong-5' \
//   -H 'sec-ch-ua: "Not:A-Brand";v="99", "Google Chrome";v="145", "Chromium";v="145"' \
//   -H 'sec-ch-ua-mobile: ?0' \
//   -H 'sec-ch-ua-platform: "macOS"' \
//   -H 'sec-fetch-dest: empty' \
//   -H 'sec-fetch-mode: cors' \
//   -H 'sec-fetch-site: same-origin' \
//   -H 'user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36' \
//   -H 'x-requested-with: XMLHttpRequest' \
//   --data-raw 'comicId=0000579493&chapterNumber=5&nameEn=sap-xuat-ngu-thi-isekai'
 