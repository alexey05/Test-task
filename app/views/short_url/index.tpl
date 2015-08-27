<header class="header">
    <h1 class="h1"><a href="/" class="header-a">URL shortener</a></h1>
</header>
<div class="content">
    <form id="js-form" action="/short_url/create_url/" method="post" class="form">
        <label for="js-long-url" class="label">Long URL</label>
        <input id="js-long-url" name="long-url" class="input" type="text" placeholder="Enter your URL">
        <div class="validation-error" id="js-validation-error"></div>
        <input type="submit" id="js-submit" class="button" value="Get short URL">
    </form>
    <div class="label short-url-label">Your short URL:</div>
    <div id="js-short-url" class="short-url"></div>
</div>