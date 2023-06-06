<?php

namespace App\Tests\events;

use App\Factory\EventsFactory;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zenstruck\Browser\Test\HasBrowser;
use Zenstruck\Foundry\Test\ResetDatabase;

class EventsResourceTest extends KernelTestCase
{
    use HasBrowser;
    use ResetDatabase;
    public function testGetEventsCollection(){


        EventsFactory::createMany(5);

        $this->browser()
            ->get('/api/events')
            ->assertJson()
            ->assertJsonMatches('"hydra:totalItems"',5);
            ;
    }
}
