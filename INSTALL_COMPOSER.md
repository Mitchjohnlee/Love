# How to Install Composer on Windows

## Option 1: Install Composer (Recommended for Gmail SMTP)

1. **Download Composer:**
   - Go to: https://getcomposer.org/download/
   - Download `Composer-Setup.exe`
   - Run the installer and follow the prompts

2. **After installation, run in PowerShell:**
   ```powershell
   composer install
   ```

3. **Update `send_mail.php` with your Gmail credentials:**
   - Line 38: Replace `'user@example.com'` with your Gmail
   - Line 39: Replace `'secret'` with your Gmail App Password
   - Line 44: Replace `'from@example.com'` with your Gmail

4. **Get Gmail App Password:**
   - Go to Google Account → Security
   - Enable 2-Step Verification
   - Go to App Passwords
   - Generate a new app password for "Mail"
   - Use that password in `send_mail.php`

---

## Option 2: Use Simple Mail (No Composer Required)

If you can't install Composer, you can use `send_mail_simple.php` instead:

1. **Rename the file:**
   - Rename `send_mail_simple.php` to `send_mail.php` (backup the original first)

2. **Update the email in the file:**
   - Line 14: Update `'from@example.com'` to your email

3. **Note:** This uses PHP's built-in `mail()` function which requires:
   - A properly configured mail server
   - May not work on localhost/XAMPP without configuration
   - Less reliable than SMTP for Gmail

---

## Option 3: Manual PHPMailer Installation

If you can't use Composer, you can manually download PHPMailer:

1. **Download PHPMailer:**
   - Go to: https://github.com/PHPMailer/PHPMailer/releases
   - Download the latest release ZIP
   - Extract it to your project folder

2. **Create folder structure:**
   ```
   Valentines/
   ├── PHPMailer/
   │   └── (extracted files)
   └── send_mail.php
   ```

3. **Update `send_mail.php` line 28:**
   ```php
   require 'PHPMailer/src/Exception.php';
   require 'PHPMailer/src/PHPMailer.php';
   require 'PHPMailer/src/SMTP.php';
   ```

4. **Remove line 28:**
   ```php
   // Remove: require 'vendor/autoload.php';
   ```

