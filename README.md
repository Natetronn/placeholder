# Placeholder #
## An ExpressionEngine Image Placeholding Add-on ##

> Placeholder allows you to easily add placeholder images to your site. Big deal right? Well, not really but, the nice thing about Placeholder is it currently combines 4 popular placeholder image servcies into one! You want cute kittens, no problem. You want dogs to chase the cute kittens, bark bark. Just need some generic non-image looking images, sure thing. How about a B&W parasailer gliding over a scenic mountain-scape? Well, I'm not sure that's available but, it might be.


## placehold.it ##
The following params are available for placehold.it:

- width (required)
- height
- text
- bg_color
- color
- format [jpg|jpeg|gif|png]
- extra (custom)

**Example usage:**

`{exp:placeholder:ph width="300" height="250" text="Nate+is+amazing!" format="jpg"}`

`{exp:placeholder:ph width="300" height="250" bg_color="E8117F" color="FFF"}`

**Aliases:**

`{exp:placeholder:ph}`

`{exp:placeholder:phit}`

`{exp:placeholder:holdit}`

`{exp:placeholder:placeholdit}`

**Notes:**


- *Use hex colors for the color and bg_color params.*
- *Text and Format params can't be used with bg_color or color apparently.*
- *If you don't add a height your image will be squared based on what you set the width param to.*
- *The text param uses the + symbol for spaces.*


## {placekitten} ##
The following params are available for placekitten:

- width (required)
- height
- greyscale [yes]
- extra (custom)

**Example usage:**

`{exp:placeholder:pk width="300" height="600" greyscale="yes"}`

**Aliases:**

`{exp:placeholder:pk}`

`{exp:placeholder:kitten}`

`{exp:placeholder:placekitten}`

`{exp:placeholder:i_hate_dogs}`

**Notes:**

*If you don't add a height your image will be squared based on your set width.*


## PlaceDog ##
The following params are available for PlaceDog:

- width (required)
- height (required)
- greyscale [yes]
- extra (custom)

**Example usage:**

`{exp:placeholder:pd width="300" height="600" greyscale="yes"}`

**Aliases:**

`{exp:placeholder:pd}`

`{exp:placeholder:dog}`

`{exp:placeholder:placedog}`

`{exp:placeholder:i_hate_cats}`

## LoremPixel ##
The following params are available for LoremPixel:

- width (required)
- height (required)
- text
- greyscale [yes]
- category [abstract|animals|city|food|nightlife|fashion|people|nature|sports|technics|transport]
- img_number [1-10]
- extra (custom)

**Example usage:**

`{exp:placeholder:lp width="300" height="400" category="sports" img_number="3" text="Flying high" greyscale="yes"}`

**Aliases:**

`{exp:placeholder:lp}`

`{exp:placeholder:pixel}`

`{exp:placeholder:lorempixel}`

**Notes:**

*Looks like special characters don't work with this service. Use [A-Z­a-z­0-9­-]*


## flickholdr ##
The following params are available for flickholdr:

- width (required)
- height (required)
- greyscale [yes]
- offsets [positive integer]
- ssl [yes]
- tags (comma seperated tags of your choosing)
- extra (custom)

**Example usage:**

`{exp:placeholder:fl width="300" height="400" tags="sun,sea" greyscale="yes" offsets="1" ssl="yes"}`

**Aliases:**

`{exp:placeholder:fl}`

`{exp:placeholder:flickr}`

`{exp:placeholder:flickholdr}`

**Notes:**

*I'm not sure how offsets work to be honest and if in fact positive integers are the only numbers which can be used or not.*


## Other Notes ##
The extra param may be used to manually add things like class, id, title, alt, rel etc. - note the single quotes

**Example usage:**

`{exp:placeholder:pk width="300" height="600" greyscale="yes" extra='alt="Cool pic" id="someID" class="someClass"'}	`

## Compatibility ##

**ExpressionEngine 2.x+**

*Tested in 2.4.0*

## Installation ##

**For EE2**

Copy `system/expressionengine/third_party/placeholder` to your `system/expressionengine/third_party` directory

## Change Log ##

**Jul 12, 2012: 1.0.1**

	Added flickholdr service
	Updated docs for flickholder usage
	Reorganized aliases by service
	Added missing required param warnings

***Jul 06, 2012: 1.0.0***

	Initial Release

## Support ##


[http://natetronn.com](http://natetronn.com)

[@natetronn](http://twitter.com/natetronn)

## Credits ##

[http://placekitten.com](http://placekitten.com)

[http://placedog.com](http://placedog.com)

[http://placehold.it](http://placehold.it)

[http://lorempixel.com](http://lorempixel.com)

[http://flickholdr.com]( http://flickholdr.com)