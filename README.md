# Event Dispatcher

[![Build Status](https://img.shields.io/travis/slince/event-dispatcher/master.svg?style=flat-square)](https://travis-ci.org/slince/event-dispatcher)
[![Coverage Status](https://img.shields.io/codecov/c/github/slince/event-dispatcher.svg?style=flat-square)](https://codecov.io/github/slince/event-dispatcher)
[![Latest Stable Version](https://img.shields.io/packagist/v/slince/event-dispatcher.svg?style=flat-square&label=stable)](https://packagist.org/packages/slince/event-dispatcher)
[![Scrutinizer](https://img.shields.io/scrutinizer/g/slince/event-dispatcher.svg?style=flat-square)](https://scrutinizer-ci.com/g/slince/event-dispatcher/?branch=master)

### Installation

Install via composer.

```bash
$ composer require slince/event-dispatcher
```

### Usage

#### Creates a event dispatcher

```php
$dispatcher = new Slince\EventDispatcher\Dispatcher();
```

#### Adds a listener for the specified event

There are two types of listeners: `callable` and `Slince\EventDispatcher\Listener` 
 
- `Slince\EventDispatcher\Listener` 

```php
use Slince\EventDispatcher\ListenerInterface;

class FooListener implements ListenerInterface
{
     public function handle(Event $event)
     {
         //do something
     }
}

$dispatcher->addListener('foo-event-name', new FooListener());
```

- `callable`

```php
$dispatcher->addListener('foo-event-name', function(Event $event){
    //do something
});
```

#### Add a subscriber

```php
use Slince\EventDispatcher\SubscriberInterface;

class FooSubscriber implements SubscriberInterface
{
     public function getEvents(Event $event)
     {
        return [
            'foo' => 'onFoo',
            'bar' => 'onBar'
        ];
     }
     
    public function onFoo(Event $event)
    {
      //do something
    }
    
    public function onBar(Event $event)
    {
       //do something
    }
}

$dispatcher->addSubscriber(new FooSubscriber());
```

#### Dispatches the event to the registered listeners

Just provides the event name.

```php
$dispatcher->dispatch('foo-event-name');
```

You can also dispatch with an event instance.

```php
$dispatcher->dispatch(new Event('foo-event-name'));
```

#### Propagation

You can call `stopPropagation` to stop event propagation on the event instance.

```php
$dispatcher->addListener('foo-event-name', function(Event $event){
    $event->stopPropagation();
});

$emitter->addListener('foo-event-name', function ($event) {
    // This will not be triggered
});

$dispatcher->dispatch('foo-event-name');
```

Checks whether propagation is stopped
 
 ```php
 $event = new Event('foo-event-name');
 $dispatcher->dispatch($event);
 
 $event->isPropagationStopped();
 ```
 
 ### License
 
The MIT license. See [MIT](https://opensource.org/licenses/MIT)