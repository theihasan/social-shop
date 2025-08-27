<?php

namespace Ihasan\SocialShop\Commands;

use Illuminate\Console\Command;

class SocialShopCommand extends Command
{
    public $signature = 'social-shop';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
