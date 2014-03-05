# Get rid of the damn "P0" generated by ExpressionEngine pagination

Having http://mysite.com and http://mysite.com/P0 both leading to the same page is bad for your SEO. It also just looks sloppy. Unfortunately, the 'previous' link url generated by EE's built in pagination doesn't strip out the "P0" from the url. That's the sole purposed of this plug in.

Wrap {exp:pagination_p0_fixer}{/exp:pagination_p0_fixer} the {auto_path} generated by ExpressionEngine pagination feature.

If "/P0" is at the end of that URL, it will remove the 'P0' from the URL. 

You can add the "removetrailingslash" parameter like this "{exp:pagination_p0_fixer removetrailingslash='true'}" to eliminate the trailing slash if you prefer.

###Usage example:

```
{exp:pagination_p0_fixer removetrailingslash='true'}{auto_path}{/exp:pagination_p0_fixer}
```

Note: There are no spaces or any extra characters beyond the {auto_path} between the opening and closing tags.


Version notes:

1.0 - initial release