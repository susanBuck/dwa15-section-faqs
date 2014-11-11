# November 11, 2014: Week 11 - Introduction to Regular Expressions 

## Introduction
This section is intended as an introduction to understanding and using regular expressions. It will be an overview rather than a deep dive. If you have never used regular expressions or have used them by copying sample code without really understanding why they work (or don't work), this section will "demystify" regular expressions and give you the tools to begin parsing the expressions you find and building your own.

The material covered here draws heavily from the Lynda.com course [Using Regular Expressions](http://www.lynda.com/Regular-Expressions-tutorials/Using-Regular-Expressions/85870-2.html). If you're interested in more detail on the topics discussed here I highly recommend watching that course.

## What are regular expressions?
*Regular expressions*, or *regex* for short, are a language or set of symbols that describe a text pattern. Regular expressions are not a programming language, but can be used inside of programming languages to define a text pattern that you want to find within a string or text file, in order to search within or manipulate that text.

For example, in Project 2, one option for getting a list of words to be used by the password generator was to scrape [a website that listed common words](http://www.paulnoll.com/Books/Clear-English/words-01-02-hundred.html). In the html for that website, the words themselves are found between `<li>` tags. One way to retrieve just the words themselves from between the tags is to write a regular expression that says "find me everything between an opening `<li>` and a closing `</li>`".

Regular expressions are generally denoted by being wrapped in forward slashes -- `/regex/` -- though some languages and engines may not require this (Regexpal does not).

Regular expressions are used in several contexts:

- On the command line, using the grep utility
- In programming languages including PHP and JavaScript
- In text editors (useful for find/replace)

Note: There are different "flavors" of regular expressions -- some languages and engines do not support all regex features.

## Regexpal
[Regexpal](http://regexpal.com) is a JavaScript-based regular expression engine that allows you to quickly test regular expressions on sample text. (Note: there are a few regex features that are not supported by JavaScript, and therefore cannot be tested in Regexpal. If you write an regex that you think should work that Regexpal is not processing as you expect, you may be using an unsupported feature.)

## Modes & Defaults
Modes, represented by checkboxes in Regexpal, provide general instructions to the engine for how a regex should be processed. Modes are generally triggered by a letter following the regular expression's closing forward slash.

- **Global** - `/regex/g` - in global mode, a regex engine will return *all* matches. In non-global mode, it will return only the earliest (leftmost) match. Regexpal is always global, but most other regex engines are non-global by default.
- **Case insensitive** - `/regex/i` - regex engines are case sensitive by default (this is generally more useful).
- **Multiline** - `/regex/m` - see "Anchors and Word Boundaries" below.
- **Dot matches all** - `/regex/s` - determines whether or not the dot metacharacter will match with line break characters (by default it will not)

## Literal Characters, Metacharacters, and Escapes
Regular expressions, most broadly, use two kinds of characters: **literal characters** and **metacharacters**. Literal characters represent that character itself, while metacharacters represent a wildcard (can be more than one character) or provide instructions to the engine on what kind of pattern to look for. The backslash character `\` is the escape **escape** -- it can be used in front of a metacharacter to turn it into a literal character, or in some cases in front of a literal character to give it special meaning as a metacharacter.

Feature | Syntax | Examples 
--- | :---: | ---
Literal characters | `a` | `/a/` matches "a" in "abc" <br> `/bc/` matches "bc" in "abc"
Metacharacters | varies | `/./` (wildcard character) matches "a", "b", "c", and "." in "abc."
Escapes | `\` | `/\./` matches only "." in "abc." (makes the `.` literal) <br> `/\\/` matches "\" in "abc\" (escapes the escape to make it literal)

## Wildcard
The dot or period metacharacter, `.`, is the **wildcard** metacharacter, and will match with any single character except a newline character. (In *dot matches all* mode, the wildcard will match newline characters as well.)

Feature | Syntax | Examples 
--- | :---: | ---
Wildcard | `.` | `/c.t/` matches "cat", "cot", and "c t" but not "cart" <br> `/..ve./` matches "river" and "paved"

## Spaces, Tabs, and Line Returns
- To match a space, simply type a space
- A tab is represented by `/t`
- Line return characters differ by operating system -- may be represented by `\r`, `\n`, or both `\r\n`

## Character Sets & Ranges

### Character Sets
A character set, denoted by brackets, `/[set]/`, tells the regex engine to match any one character from within the brackets.

Feature | Syntax | Example
--- | :---: | ---
Character set | `/[set]/` | `/[aeiou]/` matches any vowel, for instance "i" and "e" in "river"

### Character Ranges
Character ranges, denoted by a hyphen, `-`, between starting and ending characters, are used within sets as a shorthand for a contiguous range of characters. For instance `/[0-9]/` is the same as `/[0123496789]/`. 

Note that the hyphen is only a metacharacter when it's inside a set. Outside of square brackets, a hyphen is a literal character.

- `[a-z]` matches any lowercase letter
- `[A-Z]` matches any uppercase letter
- `[a-zA-Z]` matches any uppercase or lowercase letter
- `[0-9]` matches any digit

Feature | Syntax | Example 
--- | :---: | ---
Character ranges | `/[a-z]/` | `[0-9][0-9][0-9][0-9][0-9]-[0-9][0-9][0-9][0-9]` <br> matches a zip+4 area code like "02140-1234"

### Negative Character Sets
The carat symbol, `^`, negates a character set, telling the engine to match any one character *except* characters found in the set.

Feature | Syntax | Example
--- | :---: | ---
Character set | `/[set]/` | `/[^aeiou]/` matches any consonant (as well as non-letter characters like punctuation, spaces, and digits)

### Metacharacters inside sets
Most metacharacters are treated as literals inside sets, except for `^` and `-`, which have special meanings inside sets, and `]` which closes a set. These three characters therefore need to be escaped if used as literals inside a set.

### Shorthand Character Sets
Modern regular expression engines (excluding some older Unix tools) provide shorthands for some common character sets.

Shorthand | Meaning | Equivalent
--- | --- | ---
\d | Digit | [0-9]
\w | Word character <br> (includes underscore but not hyphen) | [a-zA-Z0-9_]
\s | Whitespace <br> (space, tab, or newline) | [ \t\r\n]
\D | Not digit | [^0-9]
\W | Not word character | [^a-zA-Z0-9_]
\S | Not whitespace | [^ \t\r\n]

Some languages and engines (including PHP and Unix tools but not JavaScript) also support [POSIX bracket expressions](http://www.regular-expressions.info/posixbrackets.html) such as `[[:alpha:]]` (equivalent to `[A-Za-z]`). 

## Repetition
So far we've looked at expressions that ask the regex engine to match one and only one characters. Repetition metacharacters allow you to define patterns where characters or character sets can occur zero, one, or more times.

Meaning | Metacharacter | Example
--- | :---: | ---
Repeat zero or more times | `*` | `/cats*/` matches "cat", "cats", and "catsssss"
Repeat one or more times | `+` | `/cats+/` matches "cats" and "catsssss" but not "cat"
Repeat zero or one time | `?` | `/cats?/` matches "cat" and "cats" but not "catsssss"

### Quantified Repetition
Regular expressions also provide syntax -- `/{min,max}/` -- to specify exactly how many times an item can occur.

Meaning | Syntax | Example
--- | :---: | ---
Repeat x to y times | `{x,y}` | `/[0-9]{2,4}/` matches numbers with 2 to 4 digits
Repeat exactly x times | `{x}` | `/[0-9]{4}/` matches numbers with exactly 4 digits <br> `/[0-9]{5}-[0-9]{4}/` matches a zip+4
Repeat x or more times | `/{x,}` <br> (note comma) | `/[0-9]{4,}/` matches numbers with 4 or more digits

## Lazy vs. Greedy Expressions
By default, repetition quantifiers are **greedy**, meaning the regex engine will try to give you back the longest possible string that matches your pattern. The `?` character when used after a repetition quantifier makes it **lazy** instead, meaning that it will return a match as soon as if finds one, even if there are following characters that would still be allowed in the match.

Behavior | Syntax | Example
--- | :---: | ---
Greedy -- returns the longest possible string that matches | `*` `+` `?` `{min,max}` | `/[0-9]{2,4}/` will match "1234" in "12345"
Lazy -- returns a match as soon as it can | `*?` `+?` `??` `{min,max}?` | `/[0-9]{2,4}?/` will match "12" and "34" in "12345"

## Grouping
Parentheses group characters and sets together so that repetition quantifiers can work on more than one character. They can also be used on single characters to improve readability, and to capture matches for use in backreferences (more on this below).

Meaning | Syntax | Example
--- | :---: | ---
Group characters together | `(abc)` | `/(123)+/` matches "123" and "123123123" <br> `/(re)?late/` matches "relate" and "late"

## Alternation
The alternation metacharacter, `|`, provides two or more possible options for a match. Repetition and alternation can also be nested.

Meaning | Syntax | Example
--- | :---: | ---
Match any one of two or more options | `/option1|option2|option3/` | `/\w+\.(jpg|JPG|JPEG|jpeg)/` matches "image.jpg" and "image.JPEG" <br> `/(x|X){3}/` matches "xxx" and "XXX" but also "xXx"

## Anchors & Word Boundaries

### Anchors
Anchor metacharacters allow you to search for matches that occur at the beginning or end of a line, or that constitute the entire line.

- `^` - start of string or line (`^` only has this meaning when it's the first character in a regex)
- `$` - end of string or line (again, when it's the last character in a regex)
- `\A` - start of string (not supported in JavaScript)
- `\Z` - end of string (not supported in JavaScript)

Regex engines use single line mode by default. In multiline mode, `^` and `$` can refer to the start and end of a line, as well as to the start and end of the entire string. (Note multiline mode is not supported in many Unix tools.)

In the following list:

milk<br>eggs<br>butter<br>cream cheese

`/^\w+$/` will match the first three items, *but only in multiline mode*.

### Word Boundaries
Word boundaries are found at the beginning and end of strings, and any time there is a switch between a word character (`[A-Za-z0-9_]`) and a non-word character.

- `\b` - word boundary - `/\b\w+\b/` finds four matches in "This is a test"
- `\B` - not a word boundary - `/\B\w+\B/` finds two matches in "This is a test", "hi" and "es"

Use `/\b[\w']+\b/` to match words with apostrophes in them.

## Backreferences
When expressions are grouped (surrounded by parentheses), any text that matches the grouped portion is stored by the regex engine, and can be referred to using a **backreference.** Backreferences are accessed with the syntax `\1` through `\9` where 1 is the first captured piece of text, 2 is the second, and so on. (Some engines allow for `\10` through `\99` as well.)

- `/A (rose) is a \1/` matches "A rose is a rose"
- `/<(i|em)>.+?</\1>/` matches `“\<i>Hello</i>”` but not `“<i>Hello</em>`

In modern engines, adding `?:` to the beginning of a group makes it non-capturing (to optimize for speed and save space for more captures).

## Lookaround Assertions
Lookaround assertions allow you to describe what should (or should not) occur before or after a match, without including that text in the match itself.

- `/(?=regex)/` -  **positive lookahead**
    - `/(?=catatonic)cat/` matches "cat" in "catatonic" but not in "catastrophe", can also be written `/cat(?=atonic)/`
    - `/\b[A-Za-z']+\b(?=\.))/` will match any word followed by a period
- `/(?!regex)/` - **negative lookahead**
    - `/(?!catatonic)cat/` matches "cat" in "catastrophe" but not in "catatonic", can also be written `/cat(?!atonic)/`
    - `/(\bdog\b)(?.*\1)/` will match the last occurence of "dog" in a string (using backreference)
- `/(?<=regex)/` - **positive lookbehind**
    - `/(?<=tom)cat/` matches "cat" in "tomcat" but not in "alleycat"
- `/(?<!regex)/` - **negative lookbehind**
    - `/(?<!tom)cat/` matches "cat" in "alleycat" but not in "tomcat"

Lookaround assertions are not supported by Unix tools. Simple lookbehind assertions are supported in most other languages, but not in JavaScript. Simple means literal text or character classes, and alternation between items of the same length. Java also supports repetition and optional expressions.

## Practice

- Building a regular expression to parse US phone numbers
- Understanding common regex patterns:
    - Email address: `/\b[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}\b/`
    - Password: `/^[a-z0-9_-]{6,18}$/`
    - URL: `/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/`

## Using Regular Expressions in PHP
- mode flags
- using backreferences

## Scraping Paulnoll.com

## Using Regular Expressions on the command line

## Additional Resources

Lynda tutorial chapters on:

- Efficiency
- Backreferences to optional expressions
- Using regular expressions in a text editor for find/replace
- Using lookarounds for insertion
- Double testing with lookarounds
- Lynda chapter on unicode
- Lynda chapters on sample regexes

[8 Regular Expressions You Should Know](http://code.tutsplus.com/tutorials/8-regular-expressions-you-should-know--net-6149)
