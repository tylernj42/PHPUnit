<?php
class CollectionTest extends \PHPUnit\Framework\TestCase {
    public function test_if_empty_collection_returns_no_items(){
        $collection = new \App\Support\Collection;

        $this->assertEmpty($collection->get());
    }

    public function test_count_of_items_passed_to_collection(){
        $collection = new \App\Support\Collection(['one', 'two', 'three']);

        $this->assertEquals(3, $collection->count());
    }

    public function test_if_items_passed_match_items_returned(){
        $collection = new \App\Support\Collection(['one', 'two', 'three']);

        $this->assertEquals($collection->get(), ['one', 'two', 'three']);
    }

    public function test_if_collection_is_instance_of_iterator_aggregate(){
        $collection = new \App\Support\Collection();
        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }

    public function test_if_collection_can_be_iterated(){
        $collection = new \App\Support\Collection(['one', 'two', 'three']);

        $items = [];

        foreach ($collection as $item){
            $items[] = $item;
        }

        $this->assertCount(3, $items);
        $this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
    }

    public function test_if_collection_can_be_merged_with_another_collection(){
        $collection1 = new \App\Support\Collection(['one', 'two', 'three']);
        $collection2 = new \App\Support\Collection(['five', 'six', 'seven']);

        $collection1->merge($collection2);

        $this->assertCount(6, $collection1->get());
    }

    public function test_if_can_add_to_existing_collection(){
        $collection = new \App\Support\Collection(['one', 'two', 'three']);
        $collection->add(['four']);

        $this->assertCount(4, $collection->get());
    }

    public function test_if_returns_json_encoded_items(){
        $collection = new \App\Support\Collection([
            ['username' => 'alex'],
            ['username' => 'billy']
        ]);

        $this->assertEquals('[{"username":"alex"},{"username":"billy"}]', $collection->toJson());
    }

    public function test_if_encoding_a_collection_object_returns_json(){
        $collection = new \App\Support\Collection([
            ['username' => 'alex'],
            ['username' => 'billy']
        ]);

        $encoded = json_encode($collection);

        $this->assertInternalType('string', $encoded);
        $this->assertEquals('[{"username":"alex"},{"username":"billy"}]', $encoded);
    }
}