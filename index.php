<!DOCTYPE html>
<html>
<head>
    <title>Subdomain Takeover PoC - Elastic Bug Bounty</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 900px;
            margin: 50px auto;
            padding: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .container {
            background: white;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }
        h1 {
            color: #d9534f;
            text-align: center;
            margin-bottom: 10px;
        }
        .takeover-by {
            text-align: center;
            font-size: 20px;
            margin-bottom: 30px;
            padding: 15px;
            background: #e7f3ff;
            border-radius: 8px;
        }
        .takeover-by a {
            color: #0066cc;
            text-decoration: none;
            font-weight: bold;
            font-size: 22px;
        }
        .takeover-by a:hover {
            text-decoration: underline;
            color: #0052a3;
        }
        .alert {
            background: #fff3cd;
            border-left: 5px solid #ffc107;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
        }
        .info-box {
            background: #f8f9fa;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            font-family: monospace;
            font-size: 14px;
        }
        .success {
            background: #d4edda;
            border-left: 5px solid #28a745;
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
            color: #155724;
        }
        code {
            background: #e9ecef;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 13px;
            color: #c7254e;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
            color: #6c757d;
            font-size: 13px;
        }
        .badge {
            background: #007bff;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>⚠️ Subdomain Takeover Proof of Concept</h1>
        
        <div class="takeover-by">
            Takeover by <a href="https://hackerone.com/cainvsilf" target="_blank">https://hackerone.com/cainvsilf</a>
            <span class="badge">VERIFIED</span>
        </div>
        
        <div class="success">
            <h3>✅ Takeover Successful!</h3>
            <p>This subdomain has been successfully claimed as proof of vulnerability.</p>
        </div>
        
        <div class="alert">
            <h3>Vulnerability Details</h3>
            <p><strong>Vulnerable Subdomain:</strong><br>
            <code>f23d36c874614e35ba39d54520cb1b0e.ap-northeast-1.aws.found.io</code></p>
            
            <p><strong>Original CNAME:</strong><br>
            <code>proxy.ap-northeast-1.aws.found.io</code></p>
            
            <p><strong>Original Status:</strong> HTTP 410 Gone - "Deleted resource"</p>
            
            <p><strong>Current Status:</strong> HTTP 200 OK - Controlled by @cainvsilf</p>
        </div>
        
        <div class="info-box">
            <h4>How This Was Exploited:</h4>
            <ol>
                <li>Discovered dangling CNAME record pointing to unclaimed AWS infrastructure</li>
                <li>Created Heroku application with matching custom domain</li>
                <li>Deployed this proof of concept page</li>
                <li>Subdomain now serves attacker-controlled content</li>
            </ol>
        </div>
        
        <div class="alert">
            <h3>Security Impact</h3>
            <ul>
                <li><strong>Phishing:</strong> Can host convincing phishing pages under trusted *.found.io domain</li>
                <li><strong>Malware Distribution:</strong> Serve malicious files from legitimate Elastic domain</li>
                <li><strong>SSL Certificate Abuse:</strong> Obtain valid certificates for subdomain</li>
                <li><strong>Reputation Damage:</strong> Elastic brand trust compromised</li>
                <li><strong>Session Hijacking:</strong> Steal cookies set for *.found.io</li>
            </ul>
        </div>
        
        <div class="info-box">
            <h4>Total Vulnerable Subdomains: 15</h4>
            <p>This is one of 15 subdomains found to be vulnerable to the same attack.</p>
            <p><strong>Affected Regions:</strong></p>
            <ul>
                <li>us-east-1: 9 subdomains</li>
                <li>eu-west-1: 4 subdomains</li>
                <li>ap-northeast-1: 1 subdomain</li>
                <li>ap-southeast-2: 1 subdomain</li>
            </ul>
        </div>
        
        <div class="footer">
            <p><strong>Reported By:</strong> <a href="https://hackerone.com/cainvsilf" target="_blank" style="color: #007bff; text-decoration: none; font-weight: bold;">@cainvsilf</a></p>
            <p><strong>Date:</strong> <?php echo date('F j, Y'); ?></p>
            <p><strong>Program:</strong> Elastic Bug Bounty via HackerOne</p>
            <hr style="margin: 20px 0;">
            <p><em>This is a proof of concept for responsible disclosure.<br>
            No malicious activity has been performed.<br>
            All findings have been reported to https://hackerone.com/elastic</em></p>
        </div>
    </div>
</body>
</html>
