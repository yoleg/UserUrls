UserURLs
Description: Each user gets their own unique URL based on their username.
License: GPL v2 or later
Contact: oleg@websitezen.com
Starting date: December 14, 2010

# Roadmap:
* Have the helper snippet automatically save its ID if no uu.start is set
* Make URLs more configurable. They are currently locked into site.com/username and site.com/username/action (although you can have multiple custom actions)
* Allow fields other than the username (some config options are already set for this, but don't really work if you change them)
* Allow multiple instances to occur on the site with different URL schemes (using different prefixes and/or GET parameters)
* Have the helper snipper (UserUrls) generate placeholders for user info (to replace buggy Profile snippet behavior)
* (Optimization) (Potentially) Load as a service to avoid multiple user lookups by the various snippets. 
* User groups and permissions to _have_ a UserUrl page
* User groups and permissions to _see_ a UserUrl page

# Instructions:
1. (Required) Set the "uu.start" system setting to the resource id used for the user home pages (without a sub-action). So when someone visits yoursite.com/johnsmith/ (where johnsmith is an active user's username), it will show them the content of the resource you set here.
2. (Optional) Set additional sub-pages ("action") by setting the "uu.action_map" in the format id:action,id2:action2. 
        Example: "21:messages,131:history". 
        - So, when someone visits yoursite.com/johnsmith/history, it will show them resource #131 with userid set to (johnsmith's userid) and action set to "history"
3. On the landing pages specified above, call the following snippets as needed:
    a. [[!UserUrls]] (helper snippet). See snippet code for available options.
    b. [[!uuu]] - Generates a URL to a UserUrl page (by default to the current page). To another user's page: [[!uuu? &user=`21` &action=`messages`]]. Use as output filter: [[!+userid:uuu=`action`]].
    c. [[!uuId]] - gets the UserUrl userid
    d. [[!uuAction]] - gets the UserUrl action

#Warnings:
* Test rhoroughly before using on a live site.
* Make sure your resource aliases will never override UserUrls (UserUrls are only processed onPageNotFound)
* Currently, UserUrls exposes the info for ALL users. 

#Tips:
* Use uuId with the userinfo output filter to get the user's information on their UserUrl pages. Example: [[!uuId:userinfo=`fullname`]]
* Use access policies to protect your UserUrl pages if you don't want to make them public.
* (Has bugs) Use with the Profile snippet (Login package) to generate placeholders for all of the user's information.
* Use the Peoples snippet with the "uuu" (UserUrls URL) snippet/ output filter to link to each user's UserUrl pages.
* Use with Quip to get a custom user comment wall on their UserUrl profile page
* (Coming soon) Use with the NetworkIt social networking component to add user messages and friends/ connections to your site.