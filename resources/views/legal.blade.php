@extends('layouts.app') <!-- Extend the base layout for consistent structure -->

<?php
// Define a function to return the page title based on the subsection value
function pageName($ss) {
    // If the subsection is 'tou', return 'Terms of Use'
    if ($ss === 'tou') {
        return 'Terms of Use';
    } else {
        // Otherwise, return 'Privacy Policy'
        return 'Privacy Policy';
    }
}
?>

<html>
<head>
    <!-- Set the title of the page dynamically based on the 'subsection' parameter -->
    <title>{{ pageName($subsection) }}</title>
</head>
<body>
    <!-- Display the main heading, dynamically changing based on the subsection -->
    <h1>Legal: {{ pageName($subsection) }}</h1>
    
    <!-- Check if the 'subsection' is 'tou' (Terms of Use) -->
    @if ($subsection === 'tou')
        <!-- Display the content for the Terms of Use section -->
        <p>Terms of Use<br>
        By using this website, you agree to comply with these Terms of Use. If you do not agree, do not use the Site. We may update these Terms at any time, and changes will be effective immediately.<br><br>
        
        Content: All content on this Site is protected by copyright and owned by us or our licensors. You may not copy, distribute, or use this content without permission.<br><br>
        Prohibited Use: You agree not to engage in harmful activities, including hacking, spamming, or unauthorized access to the Site.<br><br>
        Links: We are not responsible for third-party sites linked to from this Site.<br><br>
        Disclaimers: The Site is provided "as-is." We make no warranties about the accuracy or reliability of the content.<br><br>
        Limitation of Liability: We are not liable for any damages arising from your use of the Site.</p>
    <!-- Check if the 'subsection' is 'privacy' (Privacy Policy) -->
    @elseif ($subsection === 'privacy')
        <!-- Display the content for the Privacy Policy section -->
        <p>Privacy Policy<br>
        We value your privacy. This Privacy Policy explains how we collect, use, and protect your personal information.<br><br>
        
        Data Collection: We may collect personal information such as your name and email, as well as non-personal data like browser type or usage information.<br><br>
        How We Use Data: We use your information to improve services, respond to inquiries, and send marketing materials (if you opt-in).<br><br>
        Sharing: We do not sell your information, but we may share it with trusted third-party service providers to help us operate the Site.<br><br>
        Cookies: We use cookies to enhance your experience. You can manage cookies through your browser settings.<br><br>
        Security: We use reasonable measures to protect your data, but cannot guarantee absolute security.<br><br>
        Your Rights: You may have the right to access, correct, or delete your personal data. Contact us to exercise your rights.</p>
    @endif

    <!-- Include the footer of the page -->
    @include('footer')
</body>
</html>





