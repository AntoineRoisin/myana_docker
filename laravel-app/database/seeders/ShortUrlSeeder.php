<?php

namespace Database\Seeders;

use App\Models\ShortUrl;
use App\Models\User;
use Illuminate\Database\Seeder;

class ShortUrlSeeder extends Seeder
{
    public function run(): void
    {
        $links = [
            "https://www.laboutiquedugaz.fr/produit/kit-detendeur-gaz-et-tuyau-pour-weber-en417/",
            "laravel.fr/t/laravel-5/laravel-et-paiement-en-ligne-via-systempay",
            "https://fr.aliexpress.com/item/1005004714164336.html?ug_edm_item_id=1005004714164336&pdp_npi=4%40dis%21EUR%2141%2C04%E2%82%AC%2118%2C06%E2%82%AC%21%21%21%21%21%40212a66d917449638310315041d5616%21%21edm%21%21%21&edm_click_module=alg_product_l1r2_8467884730&creative_img_ind=3&edm_log_data=edm-item-list-left-one-right-two.store-product-log-link&tracelog=rowan&rowan_id1=aeug_edm_97898_1_fr_FR_2025-04-18&rowan_msg_id=roisCOWS_97898_%24ca2858c9557541ceaf157bea73f18bcc&ck=in_edm_other&mem_info=2i3w5XcoTBoG0J9Qu6sXPg%3D%3D-100003-aeug_edm_97898-Qcyj7qhHuF4k9ATQfaSvV%20eMjqU4%2Fu0pYlKkFaFT7%2Fg%3D&gatewayAdapt=glo2fra"
        ];
        $user = User::find(1);

        foreach($links AS $link) {
            ShortUrl::factory()->create([
                'user_id' => $user->id,
                'url' => $link,
                'short_url' => ShortUrl::generateShortUrl($link)
            ]);
        }

        $links = [
            "https://www.alltricks.fr/C-136792-northwave#product-review",
            "https://www.alltricks.fr/F-114954-pedales-automatiques/P-279416-paire_de_pedales_crank_brothers_candy_3_bleu",
            "https://medium.com/qunabu-interactive/quick-tip-how-to-change-laravel-user-password-from-command-line-515f55c9d295"
        ];
        $user = User::find(2);


        foreach($links AS $link) {
            ShortUrl::factory()->create([
                'user_id' => $user->id,
                'url' => $link,
                'short_url' => ShortUrl::generateShortUrl()
            ]);
        }
    }
}
