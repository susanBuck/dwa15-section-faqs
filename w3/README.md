##Explore Templating with Blade


We’ve already shown that <?php echo $var; ?> tags can be replaced with the much cleaner Blade version {{ $var }}, but Blade also provides other logic structures.

Checking if a variable is set with an if statement:

    @if (isset($var))
         {{ $var }}
    @elseif (isset($vartwo))
         {{ $vartwo }}
    @else 
       <p>The vars are not set</p>
    @endif

**Loops**

Foreach

    @foreach($arr as $item)
     {{ $item }}
    @endforeach

For
    
    @for ($i = 1; $i < 20; $i++)
         <li>{{ $i }}</li>
    @endfor

While

    @while (true)
         <p> The condition is true </p>
    @endwhile

The Unless block:

    @unless (Auth::check())
         You need to sign in.
    @endunless

As mentioned in lecture, it is good practice to create Master templates with defined sections to re-use markup. This is a cleaner, more modular approach to templating in PHP.

You insert a section into a master template by adding:

    @yeild(’sectionname’)

That section can then be defined in another View with:


    @extends(‘layouts.master’)

    @section(’sectionname’)
         <p> This markup will show within the master template section named ‘sectionname’. </p>
    @stop


###For this worksheet, your task is to explore and test some of the features mentioned above:

* Create a new Route that goes to /blade
* Pass an associative array of data values to a custom template
* Create a master template that will @yeild a section of data.
* Try each of the structures above
	- Loop through the array of values
	- Output a single item in the array, making sure to check if that item is set
	- Use the @unless structure at lease once
 
 
 