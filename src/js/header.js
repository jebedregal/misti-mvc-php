 const hoverHeader = document.querySelector(".header");

 hoverHeader.addEventListener('mouseover', function() {
      hoverHeader.classList.toggle('active_light');
})

hoverHeader.addEventListener('mouseout', function() {
     hoverHeader.classList.remove('active_light');
})


