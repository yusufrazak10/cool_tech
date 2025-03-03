@if (! cookie('cookies_accepted')) <!-- Check if the 'cookies_accepted' cookie is not set -->

    <!-- Display the cookie notification if the user hasn't accepted cookies -->
    <div class="cookie-notification">
        <!-- Message informing the user that cookies are used on the site -->
        <p>This site uses cookies to enhance your experience. By using this site, you agree to our use of cookies.</p>
        
        <!-- Button to accept cookies, triggers the acceptCookies function when clicked -->
        <button id="accept-cookies" onclick="acceptCookies()">I Agree</button>
    </div>

    <!-- JavaScript to handle the cookie acceptance process -->
    <script>
        function acceptCookies() {
            // Send a POST request to the route that handles cookie acceptance
            fetch("{{ route('cookies.accept') }}", {
                method: 'POST', <!-- Use the POST method for the request -->
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') <!-- Include the CSRF token for security -->
                }
            })
            .then(response => {
                // If the response is successful, hide the cookie notification
                if (response.ok) {
                    document.querySelector('.cookie-notification').style.display = 'none'; <!-- Hide the notification element -->
                }
            });
        }
    </script>

@endif









