document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('js-form');
    form.onsubmit = function() {
        var input = document.getElementById('js-long-url'),
            validation_error = document.getElementById('js-validation-error'),
            short_url = document.getElementById('js-short-url'),
            xhr, response;
        xhr = new XMLHttpRequest();
        xhr.open('POST', form.getAttribute('action'), true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if(xhr.readyState == 4 && xhr.status == 200) {
                response = JSON.parse(xhr.responseText);
                validation_error.innerHTML = short_url.innerHTML = '';
                if(response.validationErrors) {
                    validation_error.innerHTML = response.validationErrors;
                } else if(response.shortUrl) {
                    short_url.innerHTML = response.shortUrl;
                    input.value = '';
                }
            }
        };
        xhr.send('long-url=' + encodeURIComponent(input.value));
        return false;
    };
});