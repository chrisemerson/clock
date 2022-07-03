Clock
=====

DEPRECATED - DO NOT USE!!!
--------------------------

Since this package was created, PSR-20 has been proposed which serves the same purpose as this package. It is highly
recommended that you use PSR-20 instead of this package, as it is likely to receive a lot more community support and
compatibility in the future.

v2.0 of cemerson/clock will include an adapter to help switch to a PSR-20 compatible clock interface, as well as having
the provided `WallClock` implementation implement the newer interface too. You should switch out your dependent code to
using `ClockInterface` instead. I am currently using one provided by the package `stella-maris/clock` until PSR-20 is
finalised, at which point I may make a further version of this package to provide compatibility with the PSR provided
interface too.

There will be no further work done on this package otherwise!

Original ReadMe
---------------

You can use this library to help unit test applications that have a reliance on the clock in some way.

Rationale
---------

Unit tests are better when they are completely isolated from the environment in which they are run, and don't ever
access parts of that environment such as databases, file system, network sockets or even the current time. I have come
across multiple examples of unit tests whose results changed based on when you run them, because they rely on the PHP
time functions and behaviour changes as a result.

It's important to be able to test some classes with different time or date related inputs being used to test different
aspects. Some libraries exist that let you change the results of the built in time functions by calling some code, but
to me the solution is much simpler - you should isolate your code from the clock by injecting it into the class instead,
therefore allowing you to mock the results using your favourite unit testing framework.

Libraries that I have found so far using this either come as part of a much bigger library that I didn't require all the
complexity of, or didn't have a stable release tagged, or had other issues, so I created this library to use instead. I
would often create a similar interface in applications and thought I may as well make it a reusable component.

It is deliberately ultra-simple, with no frills, containing just enough to achieve the required results without any
added complexity.

Installing
----------

Clock requires PHP 7. Install via composer:

    composer require cemerson/clock

Usage
-----

Whenever you have a class that needs to reference the current time, don't call any time related functions in PHP.
Instead, hint for and inject the `Clock` interface from this library.

In production, you can set up your dependency injection container to inject the provided `Wallclock` class to obtain the
current time. This class takes a `DateTimeZone` object in the constructor and provides a `DateTimeImmutable` object with
the current time, using the time zone provided when its `getDateTime()` method is called.

    <?php declare(strict_types = 1);
    
    namespace MyVendor\MyApp;
    
    use CEmerson\Clock;
    
    class MyClass
    {
        /** @var Clock */
        private $clock;
        
        public function __construct(Clock $clock)
        {
            $this->clock = $clock;
        }
        
        public function myMethodThatNeedsCurrentTime()
        {
            $currentDateTime = $this->clock->getDateTime();
            
            /* ... */
        }
    }

Alternatively, create your own implementation of the `Clock` interface if you need some different functionality, or you
need the mutable version of the `DateTimeInterface` instead.

During testing, you can create a mock of the `Clock` interface to provide whatever time/date combination you like using
your favourite mocking framework, or even using your least favourite one.
