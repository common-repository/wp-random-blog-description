=== WP Random Blog Description ===
Contributors: D4N13L
Donate link: http://www.katzenhirn.com
Tags: random, bloginfo, beschreibung, blogdescription, description, blog beschreibung, slogan, zufall
Requires at least: 2.9.1
Tested up to: 3.1
Stable tag: 1.3

Replaces the Blog Description every hour, day, week or month randomly. You can define as many Blog Descriptions as you want.

== Description ==

-- English --
This plugin replaces the Standard Blog Description to your own slogans.
You can define as many slogans as you want. It's possible to define the Time the slogans
change.

After activation the plugin copy your default description to the plugin database.
When deactivated the plugin sets the last random description as your default one.

The plugin creates three new entry in your Wordpress options table. If you want to delete
my plugin please deactivation it before deinstallation, to ensure that the plugin's data on the database
is deleted as well.

WP Random Blogdescription is localizable and currently available in:

    * English
    * Deutsch


I hope you enjoy my plugin.

Have fun.

-- Deutsch --
Dieses Plugin ersetzt deine Standard Blog Description durch deine eigenen Slogans.
Du kannst so viele Slogans eingeben wie du willst. Es ist m&ouml;glich den Abstand zwischen den
Slogans einzustellen.

Nach der Aktivierung wird das Plugin deine Standard Blog Description in seine Datenbank kopieren.
Bei der Deaktivierung setzt das Plugin die letzte zuf&auml;llig generierte Beschreibung als Standard.

Das Plugin erstellt drei neue Eintr&auml;ge in die Wordpress options Tabelle. Vor dem l&uuml;schen des
Plugins sollte es sauber deaktiviert werden damit sicher gestellt werden kann, das alle Eintr&auml;ge des
Plugins entfernt wurden.

WP Random Blogdescription ist &ouml;bersetzbar und bereits verf&ouml;gbar in:

     * English
     * Deutsch

Ich hoffe euch gef&auml;llt mein Plugin.

Viel Spaﬂ

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Unzip the wp-random-blogdescription.zip and upload the folder to the `/wp-content/plugins/` directory
2. Activate the pugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= My Blog Description doesn't change. It's always the same. Why is that? =

Maybe there's only one Description in your list. 

= Is it possible to show a description on a specific date/day? =

No, but maybe in the next version.

= I saved an Descriptions, the Plugin shows me the Message "Data saved" but he dropped my Changes =

Then you have tryed to save an duplicate Description

== Screenshots ==

1. **The Admin Menu**

== Changelog ==

= 1.0 =
02-10-2010: First release.

= 1.0.1 =
02-17-2010: Change $HTTP_POST_VARS in $_POST. Now all Server can use the admin form.

= 1.0.2 =
02-17-2010: Version update (error at 1.0.1)

= 1.1 =
18-02-2010: Strukture the Code, Fix bug in load_plugin_textdomain

= 1.1.1 =
18-02-2010: Strukture .mo Files

= 1.2 =
24-02-2010: Now you can't save duplicates and you will see a "Data saved" Message after saving your Data

= 1.2.1 = 
28-02-2010: Fix bug at check_time() Function

= 1.2.2 =
03-08-2010: Fix unexcpectes output. Update user_role on the add_options function.

= 1.3 =
03-28-2011: Save the descriptions in an array. Now you can save htmlspecialchars such as " ' / \ <> 

== Upgrade Notice ==

= 1.0 =
First release
