var planContainers = document.querySelectorAll('.plan')

planContainers.forEach(function(container) {
    var titulo = container.querySelector('.titular');

  titulo.addEventListener('click', function() {

    container.classList.toggle('visible');
  });

});