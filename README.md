Tacit
=====

Tacit is:

* VM: A bytecode VM, with basic stack, memory management and interpreter
* Tac: A toy language similar in style to Assembly that comes with a lexer and compiler

Implementing a VM (and indeed a language) in PHP is silly, it's slow and limited. However, Tacit might have a purpose; for example as an educational tool.

Tacit was built with the aim of being a safe, sandboxed scripting VM for a PHP-based game. Yes, a ridiculous notion but one that works surprisingly well for simple applications.

Future
======

The aim is for Tacit to expand to be more featureful, on the list is:

* Adding registers to the VM
* Expanding the Tac language with more complex commands
* The addition of a higher-level scripting language (& compiler) similar to Ruby/Python

Get Started
======

- Clone the Repository
- Browse the examples folder
- Try and example:
    bin/tacit examples/simple.tac
