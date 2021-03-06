Tacit
=====
[![Build Status](https://travis-ci.org/errant/tacit.png?branch=master)](https://travis-ci.org/errant/tacit) 
[![Code Coverage](https://codeclimate.com/github/errant/tacit/badges/coverage.svg)](https://codeclimate.com/github/errant/tacit)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/errant/tacit/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/errant/tacit/?branch=master)

Tacit is:

* VM: A bytecode VM, with basic stack, memory management and interpreter
* Tac: A toy language similar in style to Assembly that comes with a lexer and compiler

Implementing a VM (and indeed a language) in PHP is silly, it's slow and limited. However, Tacit might have a purpose; for example as an educational tool.

Tacit was built with the aim of being a safe, sandboxed scripting VM for a PHP-based game. Yes, a ridiculous notion but one that works surprisingly well for simple applications.

Get Started
======

- Clone the Repository
- Browse the examples folder
- Try an example:
```
bin/tacit examples/simple.tac
```

Future
======

The aim is for Tacit to expand to be more featureful, on the list is:

* Adding registers to the VM
* Expanding the Tac language with more complex commands
* The addition of a higher-level scripting language (& compiler) similar to Ruby/Python

More
=======
* [Documentation](https://github.com/errant/tacit/wiki)
