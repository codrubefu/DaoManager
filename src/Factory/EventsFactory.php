<?php

namespace App\Factory;

use App\Entity\Events;
use App\Repository\EventsRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Events>
 *
 * @method        Events|Proxy create(array|callable $attributes = [])
 * @method static Events|Proxy createOne(array $attributes = [])
 * @method static Events|Proxy find(object|array|mixed $criteria)
 * @method static Events|Proxy findOrCreate(array $attributes)
 * @method static Events|Proxy first(string $sortedField = 'id')
 * @method static Events|Proxy last(string $sortedField = 'id')
 * @method static Events|Proxy random(array $attributes = [])
 * @method static Events|Proxy randomOrCreate(array $attributes = [])
 * @method static EventsRepository|RepositoryProxy repository()
 * @method static Events[]|Proxy[] all()
 * @method static Events[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Events[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Events[]|Proxy[] findBy(array $attributes)
 * @method static Events[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Events[]|Proxy[] randomSet(int $number, array $attributes = [])
 *
 * @phpstan-method        Proxy<Events> create(array|callable $attributes = [])
 * @phpstan-method static Proxy<Events> createOne(array $attributes = [])
 * @phpstan-method static Proxy<Events> find(object|array|mixed $criteria)
 * @phpstan-method static Proxy<Events> findOrCreate(array $attributes)
 * @phpstan-method static Proxy<Events> first(string $sortedField = 'id')
 * @phpstan-method static Proxy<Events> last(string $sortedField = 'id')
 * @phpstan-method static Proxy<Events> random(array $attributes = [])
 * @phpstan-method static Proxy<Events> randomOrCreate(array $attributes = [])
 * @phpstan-method static RepositoryProxy<Events> repository()
 * @phpstan-method static list<Proxy<Events>> all()
 * @phpstan-method static list<Proxy<Events>> createMany(int $number, array|callable $attributes = [])
 * @phpstan-method static list<Proxy<Events>> createSequence(iterable|callable $sequence)
 * @phpstan-method static list<Proxy<Events>> findBy(array $attributes)
 * @phpstan-method static list<Proxy<Events>> randomRange(int $min, int $max, array $attributes = [])
 * @phpstan-method static list<Proxy<Events>> randomSet(int $number, array $attributes = [])
 */
final class EventsFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'active' => self::faker()->boolean(),
            'description' => self::faker()->text(),
            'endDate' => self::faker()->dateTime(),
            'repeat' => self::faker()->boolean(),
            'startDate' => self::faker()->dateTime(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Events $events): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Events::class;
    }
}
