# nu-courses-scraping

A simple php script to scrape Nile University Courses

## Usage

To use it simply put in on any web server.

When any client goes to the web page, the web server will respond with json containing all data about the courses

## How It Works

The php script preforms a POST request with specific headers and data on a Nile University Self-Service page, which returns json data containing all courses data.

However it requires a cookie, which is why this POST request is preformed server-side.
