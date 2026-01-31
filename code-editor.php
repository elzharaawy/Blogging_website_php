<?php 
session_start(); // Start the session
// SEO Variables
$page_title = "Online Code editor - Techshiil";
$meta_description = "Learn more about Techshiil, our mission, and our dedicated team. We are committed to providing top-notch digital services.";
$meta_keywords = "about us, Techshiil, our mission, our team, digital services";

include 'partials/header.php'
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://kit.fontawesome.com/4524a6a837.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.6.0/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

    <style>
:root {
  --color-primary: #f7f9f9; /* Soft Blue */
  --color-primary-light: hsl(204, 85%, 53%); /* Light Sky Blue */
  --color-primary-variant: #2980b9; /* Strong Blue */
  --color-red: #ff0000; /* Soft Red */
  --color-red-light: #ed8d8d; /* Light Red */
  --color-green: #2ecc71; /* Soft Green */
  --color-green-light: hsl(145, 63%, 75%); /* Light Green */
  --color-gray-900: #2980b9; /* Very Light Gray */
  --color-gray-700: #bdc3c7; /* Light Gray */
  --color-gray-300: rgba(189, 195, 199, 0.3); /* Translucent Light Gray */
  --color-gray-200: rgba(0, 0, 0, 0.7); /* Translucent Darker Gray */
  --color-white: #000000; /* Pure White */
  --color-bg: #badcf4; /* Off White */
  --color-black:rgb(255, 255, 255); 


  --transition: all 300ms ease;

  --container-width-lg: 74%;
  --container-width-md: 88%;
  --form-width: 60%;

  --card-border-radius-1: 0.3rem;
  --card-border-radius-2: 0.5rem;
  --card-border-radius-3: 0.8rem;
  --card-border-radius-4: 2rem;
  --card-border-radius-5: 5rem;
}
.bodycode {
  height: 100vh;
  font-family: sans-serif;
  background-image: linear-gradient(45deg,var(--color-gray-900), var(--color-gray-700));

  display: flex;
  justify-content: center;
  align-items: center;
}

.code-editor {
  width: 90vw;
  height: 90vh;

  display: grid;
  grid-template-columns: repeat(2, 1fr);
  background-color: #fff;
  border-radius: 1rem;
  overflow: hidden;
  border: 1px solid var(--color-primary-variant);
}

.code {
  display: grid;
  grid-template-rows: repeat(3, 1fr);
  overflow-y: auto;

  background-color: var(--color-white);
  padding: 1rem;
  border-radius: 0 1rem 1rem 0;
}

.h1code {
  font: 600 1.2rem sans-serif;
  margin: 1rem 0;
  color: var(--color-primary-variant);
}

img {
  width: 1.3rem;
  margin-right: 1rem;
  vertical-align: middle;
}

.code textarea {
  width: 100%;
  height: calc(100% - 4rem);
  background-color: #bdc3c7;
  color: #000000;
  border: none;
  padding: 1rem;
  font-size: 1.1rem;
  resize: vertical;
}

#output {
  width: 100%;
  height: 100%;
  border: none;
}

.label1{
  display: flex;
  align-items: center;
  background:transparent;
  height: 30px;
  color: var(--color-primary-variant);
  font-size: 1.2rem;
}
label i {
  margin: 0.8rem;
}

.tooltip {
  position: relative;
  display: inline-block;
  cursor: pointer;
}

.tooltip .tooltiptext {
  visibility: hidden;
  white-space: nowrap; /* Prevent line breaks */
  width: auto; /* Allow the width to adjust based on content */
  background-color: var(--color-black);
  color: var(--color-white);
  text-align: center;
  border-radius: 5px;
  padding: 5px;
  position: absolute;
  z-index: 1;
  top: 50%;
  left: 110%; /* Adjust this to position the tooltip further from the icon if needed */
  transform: translateY(-50%);
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
    </style>
</head>

<body class="bodycode">
    <div class="code-editor section__extra-margin">
        <div class="code">
            <div>
                <label class="label1">
                    <img src="images/html.png" alt="">
                    <h1 class="h1code">HTML</h1>
                    <span class="tooltip">
                        <i class="fa-solid fa-copy" onclick="copyCode('html-code', this)"></i>
                        <span class="tooltiptext">Copy code</span>
                    </span>
                    <i class="fa-solid fa-floppy-disk" onclick="saveCode('html-code', 'html')"></i>
                </label>
                <textarea placeholder="type your HTML here" id="html-code" onkeyup="run()"></textarea>
            </div>
            <div>
                <label class="label1">
                    <img src="images/CSS.png" alt="">
                    <h1 class="h1code">CSS</h1>
                    <span class="tooltip">
                        <i class="fa-solid fa-copy" onclick="copyCode('css-code', this)"></i>
                        <span class="tooltiptext">Copy code</span>
                    </span>
                    <i class="fa-solid fa-floppy-disk" onclick="saveCode('css-code', 'css')"></i>
                </label>
                <textarea placeholder="type your CSS here" id="css-code" onkeyup="run()"></textarea>
            </div>
            <div>
                <label class="label1">
                    <img src="images/js.png" alt="">
                    <h1 class="h1code">JS</h1>
                    <span class="tooltip">
                        <i class="fa-solid fa-copy" onclick="copyCode('js-code', this)"></i>
                        <span class="tooltiptext">Copy code</span>
                    </span>
                    <i class="fa-solid fa-floppy-disk" onclick="saveCode('js-code', 'js')"></i>
                </label>
                <textarea spellcheck="false" id="js-code" onkeyup="run()" placeholder="Type your js here"></textarea>
            </div>
        </div>
        <iframe id="output"></iframe>
    </div>
    <script src="<?= ROOT_URL ?>js/main.js"></script>

    <script>

function run() {
  let htmlCode = document.getElementById("html-code").value;
  let cssCode = document.getElementById("css-code").value;
  let jsCode = document.getElementById("js-code").value;
  let output = document.getElementById("output");

  output.contentDocument.body.innerHTML = htmlCode + "<style>" + cssCode + "</style>";
  output.contentWindow.eval(jsCode);
}

function copyCode(id, icon) {
  const textarea = document.getElementById(id);
  textarea.select();
  textarea.setSelectionRange(0, 99999); // For mobile devices
  document.execCommand("copy");

  const tooltip = icon.nextElementSibling;
  tooltip.innerHTML = "Copied";
  setTimeout(() => {
      tooltip.innerHTML = "Copy code";
  }, 2000);
}

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

    </script>
</body>
</html>
