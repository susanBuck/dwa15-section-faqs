# November 11, 2014: Week 11 - Introduction to Regular Expressions 

## Introduction
This section is intended as an introduction to understanding and using regular expressions. It will be an overview rather than a deep dive. If you have never used regular expressions or have used them by copying sample code without really understanding why they work (or don't work), this section will "demystify" regular expressions and give you the tools to begin parsing the expressions you find and building your own.

The material covered here draws heavily from the Lynda.com course [Using Regular Expressions](http://www.lynda.com/Regular-Expressions-tutorials/Using-Regular-Expressions/85870-2.html). If you're interested in more detail on the topics discussed here I highly recommend watching that course.

## What are regular expressions?
*Regular expressions*, or *regex* for short, are a language or set of symbols that describe a text pattern. Regular expressions are not a programming language, but can be used inside of programming languages to define a text pattern that you want to find within a string or text file, in order to search within or manipulate that text.

For example, in Project 2, one option for getting a list of words to be used by the password generator was to scrape [a website that listed common words](http://www.paulnoll.com/Books/Clear-English/words-01-02-hundred.html). In the html for that website, the words themselves are found between `<li>` tags. One way to retrieve just the words themselves from between the tags is to write a regular expression that says "find me everything between an opening `<li>` and a closing `</li>`". At the end of this section we'll write a regular expression that does that.

Regular expressions are generally denoted by being wrapped in forward slashes -- `/regex/` -- though some languages and engines may not require this (Regexpal does not).

Regular expressions are used in several contexts:

- On the command line, using the grep utility
- In programming languages including PHP and JavaScript
- In text editors (useful for find/replace)

Note: There are different "flavors" of regular expressions -- some languages and engines do not support all regex features.

## Regexpal
[Regexpal](http://regexpal.com) is a JavaScript-based regular expression engine that allows you to quickly test regular expressions on sample text. (Note: there are a few regex features that are not supported by JavaScript, and therefore cannot be tested in Regexpal. If you write an regex that you think should work that Regexpal is not processing as you expect, you may be using an unsupported feature.)

## Modes & Defaults
Modes, represented by checkboxes in Regexpal, provide general instructions to the engine for how a regex should
be processed. Modes are generally triggered by a letter following the regular expression's closing forward slash.

- **Global** - `/regex/g` - in global mode, a regex engine will return *all* matches. In non-global mode, it will return only the earliest (leftmost) match. Regexpal is always global, but most other regex engines are non-global by default.
- *Case insensitive* - `/regex/i` - regex engines are case sensitive by default (this is generally more useful).
- *Multiline* - `/regex/m` - see "Anchors and Word Boundaries" below.
- *Dot matches all* - `/regex/s` - determines whether or not the dot metacharacter will match with line break characters (by default it will not)

## Literal Characters

## Metacharacters

## Escapes 

## Wildcard

## Spaces, Tabs, and Line Returns

## Character Sets & Ranges
- character ranges
- negative character sets
- metacharacters inside character sets
- shortand character sets

## Repetition
- *
- +
- ?
- Quantified

## Lazy vs. Greedy

## Grouping

## Alternation

## Anchors & Word Boundaries
- line breaks and multiline mode

## Backreferences

## Lookaround Assertions
- positive lookahead
- negative lookahead
- positive lookbehind
- negative lookbehind

## Using Regular Expressions on the command line

## Using Regular Expressions in PHP
- mode flags
- using backreferences

## Scraping Paulnoll.com

## Additional Resources
- Lynda chapters on efficiency
- Backreferences to optional expressions
- Using lookarounds for insertion
- Lynda chapter on unicode
- Lynda chapters on sample regexes
