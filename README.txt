===================================================================
MevioPMN (formally PodShowPMN) music plugin for Wordpress 2.3+
Version 1.1
Author: Neil Dixon
Home: http://neildixon.com/wordpress-plugins/
Support: me@neildixon.com

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License as
published by the Free Software Foundation; either version 2 of the
License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but
WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307
USA
===================================================================

Version History
---------------   
1.1 - Changed generated embed based on podshow.com -> mevio.com
1.0 - Initial release

About
-----
MevioPMN enables easy insertion of mevio.com/music players 
into WordPress blog posts.

Features
--------
* Very simple syntax
* Only requires the Mevio artist id

Installation
------------
* Extract the MevioPMN_1.1.zip file to your wp-content\plugins
  directory
* Go to the WordPress plugins admin panel then activate the
  MevioPMN plugin.


Usage
-----
1. Decide which player orientation you require:
 a. supersize: height=358px , width=615px 
 b. vertical: height=408px , width=338px
2. Search for the artist at http://mevio.com/music
3. Make a note of the artist_id in the URL of the artist's dedicated page
4. Add to your blog post in the following format:
 [pmn=artist_id&vertical]
For example:
Alice Cooper's artist ID is 5266, and we would like the supersize player:
[pmn=5266&supersize]
5. Save your post, and your player will appear!

The player object is surrounded by a <div> with a class 'pmnplayer' enabling you to position the player using css styles if you wish.
Look and feel of the player cannot be changed as it is a Flash file.


Configuration
-------------
No configuration required.


Questions/Suggestions/Bugs
--------------------------
http://neildixon.com/wordpress-plugins/