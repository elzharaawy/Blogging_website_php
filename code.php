# Remove the .php extension from URLs
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME}.php -f
RewriteRule ^(.*)$ $1.php [L]

# Redirect users from URLs with .php to clean URLs (for SEO purposes)
RewriteCond %{THE_REQUEST} \s(.+?)\.php[\s?] [NC]
RewriteRule ^ %1 [R=301,L]

# Rewrite specific URLs
RewriteRule ^index/([a-zA-Z0-9-]+)$ index.php?name=$1 [L]
RewriteRule ^post/([a-zA-Z0-9-]+)$ post.php?id=$1 [L]

# Exclude specific pages from having their extensions removed
RewriteRule ^signin$ signin.php [L]
RewriteRule ^sign-logic$ signin-logic.php [L]
RewriteRule ^signup$ signin.php [L]

<!-- here htaccess code. -->


#remove php file extension-e.g. https://example.com/file.php will become https://example.com/file 
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME}\.php -f
RewriteRule ^(.*)$ $1.php [NC,L] 

#remove html file extension-e.g. https://example.com/file.html will become https://example.com/file
RewriteEngine on 
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME}\.html -f
RewriteRule ^(.*)$ $1.html [NC,L]

// code

function saveCode(id, extension) {
  const code = document.getElementById(id).value;
  const blob = new Blob([code], { type: "text/plain" });
  const a = document.createElement("a");
  const url = window.URL.createObjectURL(blob);
  a.href = url;
  a.download = id + "." + extension;
  document.body.appendChild(a);
  a.click();
  window.URL.revokeObjectURL(url);
  document.body.removeChild(a);
}

function saveAllCode() {
  const html = document.getElementById('html-code').value;
  const css = document.getElementById('css-code').value;
  const js = document.getElementById('js-code').value;

  const zip = new JSZip();
  const folder = zip.folder("code");

  folder.file("index.html", html);
  folder.file("style.css", css);
  folder.file("script.js", js);

  folder.generateAsync({ type: "blob" })
      .then(function (content) {
          saveAs(content, "code.zip");
      });
}