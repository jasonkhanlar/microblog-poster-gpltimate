# microblog-poster-gpltimate
An alternative GPLv2 WordPress plugin add-on to extend MicroblogPoster Free to provide same capabilities as the Pro, Enterprise &amp; and Ultimate add-ons

See https://wordpress.org/plugins/microblog-poster/

-

Currently this plugin add-on does almost nothing other than provide a framework to continue adding features.

The code base, based off of parent plugin, is not clean, but fairly straightforward.

# Features

- **Support for '{FEATURED_IMAGE}' shortcode for Plurk**
  1. Visit https://site/wp-admin/options-general.php?page=microblogposter.php&t=2
  2. Add or Edit Plurk account and specify '{FEATURED_IMAGE}' in Message Format
      - e.g. {FEATURED_IMAGE} {URL} ({TITLE})
- **Support for including FEATURED IMAGE for Twitter**
  1. Visit https://site/wp-admin/options-general.php?page=microblogposter.php&t=2
  2. Add or Edit Twitter account and enable 'Include featured image'

# To do

## Implement features in Pro add-on

**(incomplete) Auto re-publish your old blog custom post types**

**(incomplete) Cross post to Facebook groups**

**(incomplete) Auto publish to LinkedIn company pages.**

**(incomplete) Auto update Tumblr blogs (Link format)**

**(incomplete) Auto publish to VKontakte Groups.**

## Implement features in Enterprise add-on

**(incomplete) MicroblogPoster's Control Dashboard on the new-post page.**
* (incomplete) Enable/Disable specific social accounts for this particular post.
* (incomplete) Choose on the fly the format message for each social account.

**(incomplete) Category-Driven Auto Publishing.**

**(incomplete) Manual Auto Sharing Page.**
* (incomplete) Enable/Disable specific social accounts for the manual auto sharing.
* (incomplete) Choose on the fly the format message for manual posting for each social account.

**(incomplete) Additional Url Shorteners.**
* (incomplete) Currently available: adf.ly, adfoc.us, p.pw

## Implement features in Ultimate add-on

**(incomplete) Multi-Author Mode.**
* (incomplete) Authors can link auto publishing to their own social accounts.

## Implement additional features

**(incomplete) Replace cURL dependency with WordPress HTTP API**
