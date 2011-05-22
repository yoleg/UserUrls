--------------------
Snippet: UserUrls
--------------------
Version: 0.1.X beta
Since: December 14th, 2010
Author: Oleg Pryadko (websitezen.com)
License: GNU GPLv2 (or later at your option)

This component is a user URL system for MODx Revolution.

# Help and Docs:
* Documentation: https://github.com/yoleg/userurls/wiki
* Issue Tracker: https://github.com/yoleg/userurls/issues
* Forum: http://modxcms.com/forums/index.php?topic=58068

# Instructions:
1. (Required) Set the "uu.start" system setting to the resource id used for the user home pages (without a sub-action). So when someone visits yoursite.com/johnsmith/ (where johnsmith is an active user's username), it will show them the content of the resource you set here.
2. (Optional) Set additional sub-pages ("action") by setting the "uu.action_map" in the format id:action,id2:action2. 
        Example: "21:messages,131:history". 
        - So, when someone visits yoursite.com/johnsmith/history, it will show them resource #131 with userid set to (johnsmith's userid) and action set to "history"
3. On the landing pages specified above, call the following snippets uncached as needed:
    a. [[!UserUrls]] (helper snippet). See snippet code for available options.
    b. [[!uuUrl]] - Generates a URL to a UserUrl page (by default to the current page). To another user's page: [[!uuUrl? &user=`21` &action=`messages`]]. Use as output filter: [[!+userid:uuUrl=`action`]].
    c. [[!uuId]] - gets the UserUrl userid
    d. [[!uuAction]] - gets the UserUrl action
