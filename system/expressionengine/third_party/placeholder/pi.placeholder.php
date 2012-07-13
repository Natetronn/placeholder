<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Placeholder
 *
 * @package			Placeholder
 * @version			1.0.1
 * @author			Nathan Doyle <@natetronn>
 * @copyright		Copyright (c) 2012 Cosmos Web Works, LLC
 * @license			MIT  http://opensource.org/licenses/mit-license.php
 * @link				http://github.com/Natetronn/placeholder
 */
 
/**
 * Placeholder - Plugin
 */

$plugin_info = array(
	'pi_name'				=> 'Placeholder',
	'pi_version'		=> '1.0.1',
	'pi_author'			=> 'Nathan Doyle',
	'pi_author_url'	=> 'http://natetronn.com',
	'pi_description'=> 'An ExpressionEngine Image Placeholding Add-on',
	'pi_usage'			=> Placeholder::usage()
);


class Placeholder {

	public $return_data;
    
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->EE =& get_instance();
	}
	
	public function ph()
	{
	
		$width 			= $this->EE->TMPL->fetch_param('width');
		$height 		= $this->EE->TMPL->fetch_param('height');
		$bg_color 	= $this->EE->TMPL->fetch_param('bg_color');
		$color 			= $this->EE->TMPL->fetch_param('color');
		$format 		= $this->EE->TMPL->fetch_param('format');
		$text 			= $this->EE->TMPL->fetch_param('text');
		$extra 			= $this->EE->TMPL->fetch_param('extra');
		
		// let's help them out if they add the pixels for some unknown reason
		$width 			= str_replace('.px','',$width);
		$height 		= str_replace('.px','',$height);
		
		// let's help them out by removing the # character which we won't be needing
		$color = str_replace('#','',$color);
		$bg_color = str_replace('#','',$bg_color);
		
		// we only need one period so, if they add one let's help them out and remove it
		$format = str_replace('.','',$format);

		$src = "http://placehold.it";
		
		$slash = "/";

		if ($width == FALSE) 
		{
			return 'You forgot to set the width paramater, please set it.';
		}		
		
		if ($height != FALSE)
		{
			$size = $slash.$width."x".$height;
		}
		else
		{
			$size = $slash.$width;
		}
				
		if ($bg_color != FALSE)
		{
			$bg_color = $slash.$bg_color;
		}
		
		if ($color != FALSE)
		{
			$color = $slash.$color;
		}
		
		if ($bg_color == FALSE && $color != FALSE)
		{
			$bg_color = $slash."CCC";
		}
		
		if ($text != FALSE)
		{
			$text = "&text=".$text;
		}
		
		if ($format != FALSE)
		{
			$format = ".".$format;
		}
		
		if ($color != FALSE OR $bg_color != FALSE)
		{
			if ($extra != FALSE)
			{
				$placeholder = '<img '.$extra.' src="'.$src.$size.$bg_color.$color.'" />';
			}
			else
			{
				$placeholder = '<img src="'.$src.$size.$bg_color.$color.'" />';
			}
		}
		else
		{
			if ($extra != FALSE)
			{
				$placeholder = '<img '.$extra.' src="'.$src.$size.$format.$text.'" />';
			}
			else
			{
				$placeholder = '<img src="'.$src.$size.$format.$text.'" />';
			}
		}
		
		return $placeholder;
	}
	
	// Switching things up a bit for the {placekitten} service
	public function pk()
	{
	
		$width 			= $this->EE->TMPL->fetch_param('width');
		$height 		= $this->EE->TMPL->fetch_param('height');		
		$greyscale	=	$this->EE->TMPL->fetch_param('greyscale');
		$extra 			= $this->EE->TMPL->fetch_param('extra');
		
		// let's help them out if they add the pixels for some unknown reason
		$width 			= str_replace('.px','',$width);
		$height 		= str_replace('.px','',$height);
		
		$slash = "/";
		
		if ($width == FALSE) 
		{
			return 'You forgot to set the width paramater, please set it.';
		}	
	
		if (isset($greyscale) && $greyscale == "yes")
		{
			$src = "http://placekitten.com/g/";
		}
		else
		{
			$src = "http://placekitten.com/";
		}
		
		if (isset($height))
		{
			$size = $width."/".$height;
		}

		if ($extra != FALSE)
		{
			$placeholder = '<img '.$extra.' src="'.$src.$size.'" />';
		}
		else
		{
			$placeholder = '<img src="'.$src.$size.'" />';
		}
		return $placeholder;

	}
	
	// Switching things up a bit for the placedog service
	public function pd()
	{
	
		$width 			= $this->EE->TMPL->fetch_param('width');
		$height 		= $this->EE->TMPL->fetch_param('height');		
		$greyscale	=	$this->EE->TMPL->fetch_param('greyscale');
		$extra 			= $this->EE->TMPL->fetch_param('extra');
		
		// let's help them out if they add the pixels for some unknown reason
		$width 			= str_replace('.px','',$width);
		$height 		= str_replace('.px','',$height);
		
		$slash = "/";
		
		if ($width == FALSE) 
		{
			return 'You forgot to set the width paramater, please set it.';
		}
		
		if ($height == FALSE) 
		{
			return 'You forgot to set the height paramater, please set it.';
		}
		
	
		if (isset($greyscale) && $greyscale == "yes")
		{
			$src = "http://placedog.com/g/";
		}
		else
		{
			$src = "http://placedog.com/";
		}
		
		if (isset($height))
		{
			$size = $width."/".$height;
		}

		if ($extra != FALSE)
		{
			$placeholder = '<img '.$extra.' src="'.$src.$size.'" />';
		}
		else
		{
			$placeholder = '<img src="'.$src.$size.'" />';
		}
		return $placeholder;

	}
	
	// Switching things up a bit for the lorempixel service
	public function lp()
	{
	
		$width 			= $this->EE->TMPL->fetch_param('width');
		$height 		= $this->EE->TMPL->fetch_param('height');
		$text 			= $this->EE->TMPL->fetch_param('text');
		$greyscale	=	$this->EE->TMPL->fetch_param('greyscale');
		$category		=	$this->EE->TMPL->fetch_param('category');
		$img_number	=	$this->EE->TMPL->fetch_param('img_number');
		$extra 			= $this->EE->TMPL->fetch_param('extra');
		
		// let's help them out if they add the pixels for some unknown reason
		$width 			= str_replace('.px','',$width);
		$height 		= str_replace('.px','',$height);
		
		$slash = "/";
	
		if ($width == FALSE) 
		{
			return 'You forgot to set the weight paramater, please set it.';
		}
		if ($height == FALSE) 
		{
			return 'You forgot to set the height paramater, please set it.';
		}
	
		if (isset($greyscale) && $greyscale == "yes")
		{
			$src = "http://lorempixel.com/g/";
		}
		else
		{
			$src = "http://lorempixel.com/";
		}
		
		if ($category != FALSE)
		{
			$category = $slash.$category;
		}
		
		if ($img_number != FALSE)
		{
			$img_number = $slash.$img_number;
		}
		
		if ($text != FALSE)
		{
			$text = $slash.$text;
		}
		
		if ($extra != FALSE)
		{
			$placeholder = '<img '.$extra.' src="'.$src.$width.$slash.$height.$category.$img_number.$text.'" />';
		}
		else
		{
			$placeholder = '<img src="'.$src.$width.$slash.$height.$category.$img_number.$text.'" />';
		}
		
		return $placeholder;
	}
	
	// Switching things up a bit for the flickholdr service
	public function fl()
	{
	
		$width 			= $this->EE->TMPL->fetch_param('width');
		$height 		= $this->EE->TMPL->fetch_param('height');
		$greyscale	=	$this->EE->TMPL->fetch_param('greyscale');
		$tags				=	$this->EE->TMPL->fetch_param('tags');
		$offsets		=	$this->EE->TMPL->fetch_param('offsets');
		$ssl				=	$this->EE->TMPL->fetch_param('ssl');
		$extra 			= $this->EE->TMPL->fetch_param('extra');
		
		// let's help them out if they add the pixels for some unknown reason
		$width 			= str_replace('.px','',$width);
		$height 		= str_replace('.px','',$height);
		
		$slash = "/";
	
		if ($width == FALSE) 
		{
			return 'You forgot to set the weight paramater, please set it.';
		}
		if ($height == FALSE) 
		{
			return 'You forgot to set the height paramater, please set it.';
		}

		if (isset($ssl) && $ssl == 'yes')
		{
			$src = "https://ssl.flickholdr.com/";
		}
		else
		{
			$src = "http://flickholdr.com/";
		}
		
		if ($tags != FALSE)
		{
			$tags = str_replace(' ', '', $tags);
			$tags = rtrim($tags, ',');
			$tags = $slash.$tags;
		}
		
		if (isset($greyscale) && $greyscale == "yes")
		{
			$greyscale = $slash."bw";
		}
		
		if ($offsets != FALSE)
		{
			$offsets = $slash.$offsets;
		}

		
		if ($extra != FALSE)
		{
			$placeholder = '<img '.$extra.' src="'.$src.$width.$slash.$height.$tags.$greyscale.$offsets.'" />';
		}
		else
		{
			$placeholder = '<img src="'.$src.$width.$slash.$height.$tags.$greyscale.$offsets.'" />';
		}
		
		return $placeholder;
	}

	// lets alias our functions		
	public function placeholdit()
	{
		return $this->ph();
	}
	
	public function holdit()
	{
		return $this->ph();
	}
	
	public function phit()
	{
		return $this->ph();
	}
	
	public function placedog()
	{
		return $this->pd();
	}
	
	public function dog()
	{
		return $this->pd();
	}
	
	public function i_hate_cats()
	{
		return "Do you really hate cats?";
	}
	
	public function placekitten()
	{
		return $this->pk();
	}
	
	public function kitten()
	{
		return $this->pk();
	}
	
	public function i_hate_dogs()
	{
		return "Do you really hate dogs?";
	}
	
	public function lorempixel()
	{
		return $this->lp();
	}
	
	public function pixel()
	{
		return $this->lp();
	}
	
	public function lorem()
	{
		return $this->lp();
	}
	
	public function flickholdr()
	{
		return $this->fl();
	}
	
	public function flickr()
	{
		return $this->fl();
	}

	
	
	/**
	 * Plugin Usage
	 */
	public static function usage()
	{
		ob_start();
?>
	
	=====PLACEHOLD.IT======
	The following params are available for placehold.it:
	
	width (required)
	height
	text
	bg_color
	color
	format [jpg|jpeg|gif|png]
	extra (custom attributes)
	
	Example usage:
	
	{exp:placeholder:ph width="300" height="250" text="Nate+is+amazing!" format="jpg"}
	
	{exp:placeholder:ph width="300" height="250" bg_color="E8117F" color="FFF"}
	
	Aliases:
	{exp:placeholder:ph}
	{exp:placeholder:phit}
	{exp:placeholder:holdit}
	{exp:placeholder:placeholdit}
	
	Notes:
	Use hex colors for the color and bg_color params.
	Text and Format params can't be used with bg_color or color apparently.
	If you don't add a height your image will be a squared based on your what you set the width param to.
	The text param uses the + symbol for spaces.
	
	
	======{placekitten}======
	The following params are available for placekitten:

	width (required)
	height
	greyscale [yes]
	extra (custom attributes)
	
	Example usage:
	
	{exp:placeholder:pk width="300" height="600" greyscale="yes"}
	
	Aliases:
	{exp:placeholder:pk}
	{exp:placeholder:kitten}
	{exp:placeholder:placekitten}
	{exp:placeholder:i_hate_dogs}
	
	Notes:
	If you don't add a height your image will be a squared based on your set width.
	
	
	======PlaceDog======
	The following params are available for PlaceDog:

	width (required)
	height (required)
	greyscale [yes]
	extra (custom attributes)
	
	Example usage:
	
	{exp:placeholder:pd width="300" height="600" greyscale="yes"}

	Aliases:
	{exp:placeholder:pd}
	{exp:placeholder:dog}
	{exp:placeholder:placedog}
	{exp:placeholder:i_hate_cats}
	
	======LoremPixel======
	The following params are available for LoremPixel:
	
	width (required)
	height (required)
	text
	greyscale [yes]
	category [abstract|animals|city|food|nightlife|fashion|people|nature|sports|technics|transport]
	img_number [1-10]
	extra (custom attributes)
	
	Example usage:
	
	{exp:placeholder:lp width="300" height="400" category="sports" img_number="3" text="Flying high" greyscale="yes"}
	
	Aliases:
	{exp:placeholder:lp}
	{exp:placeholder:pixel}
	{exp:placeholder:lorempixel}
	
	Notes:

	Looks like special characters don't work with this service. Use [A-Za-z0-9-]
	
	======flickholdr======
	The following params are available for flickholdr:
	
	width (required)
	height (required)
	greyscale [yes]
	offsets [positive integer]
	ssl [yes]
	tags [sun,sea] (comma seperated tags of your choosing)
	extra (custom attributes)
	
	Example usage:
	
	{exp:placeholder:fl width="300" height="400" tags="sun,sea" greyscale="yes" offsets="1" ssl="yes"}
	
	Aliases:
	{exp:placeholder:fl}
	{exp:placeholder:flickr}
	{exp:placeholder:flickholdr}
	
	Notes:
	
	I'm not sure how offsets work to be honest and if in fact positive integers are the only numbers which can be used or not.
	
	======Other Notes======
	The extra param may be used for manually adding things like class, id, title, alt, rel etc. - note the single quotes
	
	Example usage:
	
	{exp:placeholder:pk width="300" height="600" greyscale="yes" extra='alt="Cool pic" id="someID" class="someClass"'}	
	
	======Credits======
	http://placekitten.com
	http://placedog.com
	http://placehold.it
	http://lorempixel.com
	http://flickholdr.com

<?php
		$buffer = ob_get_contents();
		ob_end_clean();
		return $buffer;
	}
}


/* End of file pi.placeholder.php */
/* Location: /system/expressionengine/third_party/placeholder/pi.placeholder.php */