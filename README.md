Poker Hands Evaluator
=====================

Poker hands evaluator library can determine the rank of a poker hands and sort them depending on rank it has.
 
Requirements
============

* PHP >= 7.2.0
* mbstring PHP extension

Installation
============

First of all, add new VCS source to `repositories` section in your `composer.json`:  

```   
"repositories": [
  // Some other repository sources can be here... 
  {
    "type": "vcs",
    "url": "https://github.com/stefovcharenko/poker-hands-evaluator"
  }
]
```
Then, add `stefan/poker-hands-evaluator` package to `require` section in your `composer.json`:

```
"require": {
  // Some other packages can be here...
  "stefan/poker-hands-evaluator": "dev-master"
}
```

In the end, run `composer update` to install library from new specified dependencies.

Usage
=====
Hands processor can use different sources and return data in different formats.

For now only files supported as import sources and output as a string is available.

For hands evaluation usage, you should create new instance of `PokerHandsEvaluator` class 
and set parser and output objects for it:
```php
$evaluator = new PokerHandsEvaluator();
$evaluator
    ->setParser(new TextSourceParser($pathToFile))
    ->setOutput(new StringOutput());
```

Then you can receive result in format you set up after calling evaluator's `process` method:
```php
$result = $evaluator->process();
```