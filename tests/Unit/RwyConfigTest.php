<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Airport;
use App\Models\RwyConfigs;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class RwyConfigTest extends TestCase
{
    /**
     *  @test
     */
    public function it_belongs_to_an_airport()
    {        
        $rwy_config = factory(RwyConfigs\RwyConfig::class)->make();
        $this->assertInstanceOf(Airport::class, $rwy_config->airport);
    }
}
