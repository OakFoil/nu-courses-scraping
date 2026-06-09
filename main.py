from playwright.sync_api import sync_playwright
import json

with sync_playwright() as p:
    browser = p.chromium.launch(headless=True)

    page = browser.new_page()
    page.goto("https://register.nu.edu.eg/PowerCampusSelfService/Home/LogIn", wait_until="networkidle")

    page.fill("#txtUsername", "${USERNAME}")
    page.click("#btnNext")
    page.wait_for_load_state("networkidle")
    if (page.url != "https://register.nu.edu.eg/PowerCampusSelfService"):
      page.fill("#txtPassword", "${PASSWORD}")
      page.click("#btnSignIn")
    page.wait_for_selector("#mainContent")

    cookies = page.context.cookies("https://register.nu.edu.eg")
    cookie_header = "; ".join([f"{cookie['name']}={cookie['value']}" for cookie in cookies]) # pyright: ignore[reportTypedDictNotRequiredAccess]

    json = json.dumps({"COOKIE": cookie_header})

    print(json)

    browser.close()
