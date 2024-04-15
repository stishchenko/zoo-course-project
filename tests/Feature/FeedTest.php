<?php

namespace Tests\Feature;

use App\Models\Animal;
use App\Models\Feed;
use Database\Seeders\TestSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed(TestSeeder::class);
    }

    public function test_feeds_reading_without_relations(): void
    {
        $this->assertDatabaseCount('feeds', 3);
        $feeds = Feed::all();
        $this->assertCount(3, $feeds, 'Incorrect amount of feeds');
        foreach ($feeds as $feed) {
            $feedArray = $feed->toArray();

            $this->assertIsArray($feedArray);
            $this->assertArrayHasKey('id', $feedArray);
            $this->assertIsInt($feedArray['id']);
            $this->assertArrayHasKey('name', $feedArray);
            $this->assertIsString($feedArray['name']);
            $this->assertArrayHasKey('type', $feedArray);
            $this->assertIsString($feedArray['type']);
            $this->assertArrayHasKey('manufacturer', $feedArray);
            $this->assertIsString($feedArray['manufacturer']);
            $this->assertArrayHasKey('price', $feedArray);
            $this->assertIsFloat($feedArray['price']);
            $this->assertArrayHasKey('unit', $feedArray);
            $this->assertIsString($feedArray['unit']);
            $this->assertArrayHasKey('total_amount', $feedArray);
            $this->assertIsFloat($feedArray['total_amount']);
        }
    }

    public function test_feeds_reading_with_animals(): void
    {
        $this->assertDatabaseCount('feeds', 3);
        $feeds = Feed::with('animals')->get();
        $this->assertCount(3, $feeds, 'Incorrect amount of feeds');
        foreach ($feeds as $feed) {
            $this->assertModelExists($feed);

            $animals = $feed->animals;
            $this->assertNotNull($animals);
            $this->assertTrue($animals->count() > 0);
        }
    }

    public function test_successful_feed_creation_without_relations(): void
    {
        $this->assertDatabaseCount('feeds', 3);

        $feed = Feed::factory()->create();

        $this->assertNotNull($feed);
        $this->assertModelExists($feed);
        $this->assertCount(4, Feed::all());
    }

    public function test_successful_feed_creation_with_animals(): void
    {
        $this->assertDatabaseCount('feeds', 3);

        $feed = Feed::factory()->create();

        $this->assertNotNull($feed);
        $this->assertModelExists($feed);
        $this->assertCount(4, Feed::all());
        $this->assertCount(0, $feed->animals);

        $animal = Animal::inRandomOrder()->first();
        $feed->animals()->attach($animal->id, ['portion' => 100]);
        $feed->refresh();
        $this->assertCount(1, $feed->animals);
    }

    public function test_successful_update_feed(): void
    {
        $this->assertDatabaseCount('feeds', 3);
        $feed = Feed::inRandomOrder()->first();
        $this->assertModelExists($feed);
        $this->assertArrayHasKey('name', $feed->toArray());
        $beforeName = $feed->name;
        $feed->name = 'new name';
        $this->assertNotEquals($beforeName, $feed->name);
    }

    public function test_successful_delete_feed(): void
    {
        $this->assertDatabaseCount('feeds', 3);
        $feed = Feed::inRandomOrder()->first();
        $this->assertModelExists($feed);

        $feedId = $feed->id;
        $feed->animals()->detach();
        $feed->delete();
        $this->assertModelMissing($feed);
        $this->assertNull(Feed::find($feedId));
        $this->assertDatabaseCount('feeds', 2);
    }
}
