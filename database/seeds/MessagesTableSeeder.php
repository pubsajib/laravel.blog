<?php
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder {
    public function run() {
        $body = '';
        $body .= '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, animi, dolores quia perspiciatis voluptates aut harum. Veniam assumenda laudantium accusantium e quae. </p>';
        // create default comments
        factory(App\Message::class, 20)->create();
    }
}
