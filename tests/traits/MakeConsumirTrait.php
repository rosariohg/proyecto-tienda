<?php

use Faker\Factory as Faker;
use App\Models\Consumir;
use App\Repositories\ConsumirRepository;

trait MakeConsumirTrait
{
    /**
     * Create fake instance of Consumir and save it in database
     *
     * @param array $consumirFields
     * @return Consumir
     */
    public function makeConsumir($consumirFields = [])
    {
        /** @var ConsumirRepository $consumirRepo */
        $consumirRepo = App::make(ConsumirRepository::class);
        $theme = $this->fakeConsumirData($consumirFields);
        return $consumirRepo->create($theme);
    }

    /**
     * Get fake instance of Consumir
     *
     * @param array $consumirFields
     * @return Consumir
     */
    public function fakeConsumir($consumirFields = [])
    {
        return new Consumir($this->fakeConsumirData($consumirFields));
    }

    /**
     * Get fake data of Consumir
     *
     * @param array $postFields
     * @return array
     */
    public function fakeConsumirData($consumirFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'producto_id' => $fake->randomDigitNotNull,
            'cantidad_total' => $fake->word,
            'cantidad_consumo' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $consumirFields);
    }
}
