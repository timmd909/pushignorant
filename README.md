# pushignorant

For those who wish to be in a fantasy football league, but without the responsibility of
knowing what American football is

# Overview

This project was born due to my inability to do a simple fantasy football league. As 
I refused to learn anything about American football, and how placing picks go, I 
figure it best to do things this way. 

The are few goals, but they are extremely important: 

1. Make administering a fantasy league closer to simple to prevent the commissioner 
   from premature aging.
2. Allow simple bet submissions that do not require cutting and pasting 
3. Allow realtime validation to disallow users from submitting invalid bets
4. Prevent overuse of memes with kittens in football helmets
5. Have an acceptable mobile and desktop experience

## Front end web

* Responsive UI
* Log-in and out functionality 
* Browse current betting odds
  * Could be as simple as a modal w/ an IFRAME of the four possible sources
* Place a bet 
  * How to present that? Simplest:
    * Give a choice of the 4 main sites
    * Pick a source (one of those columns in the table)
    * Pick the spread or over/under (determine how the spread works later)
* Bootstrap 3.x based layout to speed development

## Backend 

* Linux
* PHP
  * For constructing the pages and sending data to the user
* NodeJS
  * Use PhantomJS for scraping what is necessary from the various servers
  * Easy to integrate with jQuery    
* Responsible for crawling the various betting services. 
* Crawling will be done by the server (and possibly the client)
* Notifications
  * Emails the head of the league w/ the pick
  * Send an email to the picker? 
* Validation
  * Write something to parse the start time to prevent late submissions 
* Reminder emails? 
  * If a particular user hasn't registered a pick, send an email Sunday at noon as
    a reminder. That would really help me.
* Auto-pick
  * Opt-in feature that allows the server to random pick choices every Sunday.
  * This is so God-mode.
  * Ask Rob about this feature. 
  * To make it fair, do something super random yet lacking any strategy:
    * Pick 5 teams
    * Bet over on all of them, or under on all over 

## Database 

* The database is only concerned with recording submissions. 
* MariaDB based for convenience and to say "fuck you" to Oracle.

While accepting a bet, make sure this information is recorded: 

* Scraping results for all sources for use in cross-referencing submissions
  * This should be server side to prevent the user from tampering
  
## Scrape it like a polaroid picture

* Two sites to rule them all
  * There are basically two sites, but with two divisions each:
    * Vegas
      * http://www.vegas.com/gaming/sportsline/college-football/
      * http://www.vegas.com/gaming/sportsline/football/
    * http://sports.yahoo.com/ncaa/football/odds
    * http://sports.yahoo.com/nfl/odds
  * Two algorithms is all that's needed. 
  * Make sure to wrap the logic in something nice like `scrapeSite(scraper)`
    * `scaper` is a function that is given a URL
    * It returns an object/arrays that relate the information in a normalized manner
  
# Questions 

* Should the application be able to crawl and grab information both from the client
  end, and server side? 
  * Crawling from the browser to place bets would be nice. 
    * Reduces the load on the server, and prevents the application from being blocked 
      by the target servers 
  * Use Knockout or Angular? 
  
