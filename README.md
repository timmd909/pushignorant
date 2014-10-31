# pushignorant

For those who wish to be in a fantasy football league, but without the responsibility of
knowing what American football is

# Overview

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

## Backend 

* Linux
* PHP
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
  
  
# Questions 

* Should the application be able to crawl and grab information both from the client
  end, and server side? 
  * Crawling from the browser to place bets would be nice. 
    * Reduces the load on the server, and prevents the application from being blocked 
      by the target servers 
  * Use Knockout or Angular? 
  
