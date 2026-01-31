try {
  const navItem = document.querySelector(".nav__items");
  const openNavBtn = document.querySelector("#open__nav-btn");
  const closeNavBtn = document.querySelector("#close__nav-btn");
  const openNav = () => {
    navItem.style.display = "flex";
    openNavBtn.style.display = "none";
    closeNavBtn.style.display = "inline-block";
  };
  const closeNav = () => {
    navItem.style.display = "none";
    openNavBtn.style.display = "inline-block";
    closeNavBtn.style.display = "none";
  };
  openNavBtn.addEventListener("click", openNav);
  closeNavBtn.addEventListener("click", closeNav);
} catch (error) {
  //   console.error("Error occurred in toggle functionality:", error);
}
if (window.innerWidth <= 600)
  try {
    const sidebar = document.querySelector("aside");
    const showSidebarBtn = document.querySelector("#show__sidebar-btn");
    const hideSidebarBtn = document.querySelector("#hide__sidebar-btn");

    const showSidebar = () => {
      sidebar.style.left = "0";
      showSidebarBtn.style.display = "none";
      hideSidebarBtn.style.display = "inline-block";
    };

    const hideSidebar = () => {
      sidebar.style.left = "-100%";
      showSidebarBtn.style.display = "inline-block";
      hideSidebarBtn.style.display = "none";
    };

    showSidebarBtn.addEventListener("click", showSidebar);
    hideSidebarBtn.addEventListener("click", hideSidebar);

    window.onload = showSidebar;
  } catch (error) {
    //   console.error("Error occurred in sidebar functionality:", error);
  }

  /// contact page 
  const inputs = document.querySelectorAll(".input1");

function focusFunc() {
  let parent = this.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
});
 
// share icons code here 

function copyToClipboard(event, text) {
  event.preventDefault();
  navigator.clipboard.writeText(text).then(function() {
      var tooltip = document.querySelector('#copy-link .tooltip');
      tooltip.textContent = 'Link Copied';
      setTimeout(function() {
          tooltip.textContent = 'Copy Link';
      }, 2000);
  }, function(err) {
      console.error('Could not copy text: ', err);
  });
}
// dark theme toggle 
document.addEventListener('DOMContentLoaded', () => {
  const toggleButton = document.getElementById('theme-toggle');
  const body = document.body;

  toggleButton.addEventListener('click', () => {
      body.classList.toggle('dark-theme');
      const isDark = body.classList.contains('dark-theme');
      localStorage.setItem('theme', isDark ? 'dark' : 'light');
      toggleButton.innerHTML = isDark ? '<i class="uil uil-sun"></i>' : '<i class="uil uil-moon"></i>';
  });

  const currentTheme = localStorage.getItem('theme');
  if (currentTheme === 'dark') {
      body.classList.add('dark-theme');
      toggleButton.innerHTML = '<i class="uil uil-sun"></i>';
  } else {
      toggleButton.innerHTML = '<i class="uil uil-moon"></i>';
  }
});


// scroll up button 

// Get the button
let mybutton = document.getElementById("scrollToTopBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

// Attach click event to the button
mybutton.addEventListener("click", topFunction);




// popup video youtube

document.addEventListener('DOMContentLoaded', function() {
  const modal = document.getElementById('videoModal');
  const btn = document.getElementById('videoBtn');
  const span = document.getElementsByClassName('close')[0];
  const videoFrame = document.getElementById('videoFrame');

  btn.onclick = function() {
    modal.style.display = 'block';
    videoFrame.src = 'https://www.youtube.com/embed/5w7AAWrj5to?autoplay=1';
  }

  span.onclick = function() {
    modal.style.display = 'none';
    videoFrame.src = '';
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = 'none';
      videoFrame.src = '';
    }
  }
});


// news letter 
document.getElementById('newsletter-form').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent form from submitting the traditional way

  const formData = new FormData(this);
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'subscribe.php', true);

  xhr.onload = function () {
      const alertMessage = document.getElementById('alert-message');
      alertMessage.style.display = 'block';
      if (xhr.status >= 200 && xhr.status < 300) {
          alertMessage.innerHTML = xhr.responseText;
      } else {
          alertMessage.innerHTML = 'An error occurred. Please try again later.';
      }
  };

  xhr.send(formData);
});

