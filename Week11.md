# November 11, 2014: Week 11 - Introduction to Regular Expressions 

## Introduction

This section is intended as an introduction to understanding and using regular expressions. It will be an overview rather than a deep dive. If you are already familiar with regular expressions, you may not need to watch this section. However if you have never used regular expressions or have used them by copying sample code without really understanding why they work (or don't work), this section will "demystify" regular expressions and give you the tools to begin parsing the expressions you find and building your own.

The material covered here draws heavily from the Lynda.com course (Using Regular Expressions)[http://www.lynda.com/Regular-Expressions-tutorials/Using-Regular-Expressions/85870-2.html]. If you're interested in more detail on the topics discussed here I highly recommend watching that course.

## What are regular expressions?
*Regular expressions*, or *regex* for short, are a language or set of symbols that describe a text pattern. Regular expressions are not a programming language, but can be used inside of programming languages to define a text pattern that you want to find within a string or text file, in order to search within or manipulate that text.

For example, in Project 2, one option for getting a list of words to be used by the password generator was to scrape (a website that listed common words)[http://www.paulnoll.com/Books/Clear-English/words-01-02-hundred.html]. In the html for that website, the words themselves are found between `<li>` tags. One way to get just the words themselves from within the tags is to write a regular expression that says "find me everything between an opening `<li>` and a closing `</li>`". At the end of this section we'll write a regular expression that does that.

