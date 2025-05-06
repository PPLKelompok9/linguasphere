<?php

namespace Illuminate\Cache\Events;

class CacheFlushing
{
    /**
     * The name of the cache store.
     *
     * @var string|null
     */
    public $storeName;

    /**
<<<<<<< HEAD
=======
     * The tags that were assigned to the key.
     *
     * @var array
     */
    public $tags;

    /**
>>>>>>> 890ebdd96f7d6873ba198cc859e87d61062ce611
     * Create a new event instance.
     *
     * @param  string|null  $storeName
     * @return void
     */
<<<<<<< HEAD
    public function __construct($storeName)
    {
        $this->storeName = $storeName;
=======
    public function __construct($storeName, array $tags = [])
    {
        $this->storeName = $storeName;
        $this->tags = $tags;
    }

    /**
     * Set the tags for the cache event.
     *
     * @param  array  $tags
     * @return $this
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
>>>>>>> 890ebdd96f7d6873ba198cc859e87d61062ce611
    }
}
