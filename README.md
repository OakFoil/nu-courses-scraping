# nu-courses-scraping

A simple php script to scrape Nile University Courses

## Usage

To use it

1. install dependencies

   ```bash
   pip install -r requirements.txt
   python -m playwright install --with-deps
   ```

2. put your username and password into the python script and run it to get your cookie

   ```bash
   python main.py
   ```

   - The python script will output something like

      ```json
      {"COOKIE": $COOKIE}
      ```

3. Get the $COOKIE part and place it in the php script then simply put in on any web server.

When any client goes to the web page, the web server will respond with json containing all data about the courses

## How It Works

The php script preforms a POST request with specific headers and data on a Nile University Self-Service page, which returns json data containing all courses data.

However it requires a cookie, which is why this POST request is preformed server-side.
